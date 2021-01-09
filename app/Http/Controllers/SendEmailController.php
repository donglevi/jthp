<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Excel\SimpleXLSX;
use Mail;
use Auth;
use Validator;
use App\User;
use View;





class SendEmailController extends Controller{

	public function getHome(Request $request){
        // delete
        if($request->input('delete')){
            if(DB::table('project')->where('id', $request->input('delete'))->where('user_id', Auth::User()->id)->exists()){
                DB::table('project')->where('id',$request->input('delete'))->delete();
                DB::table('project_column')->where('project_id',$request->input('delete'))->delete();
                return redirect()->back()->withSuccess('Xóa thành công');
            }else{
                return redirect()->back()->withErrors('Không thể xóa');
            }
        }else{
            $project = DB::table('project')->where('user_id', Auth::User()->id)->orderBy('status', 'desc')->orderBy('id', 'desc')->get();
            return view('home.sendemail',array('project'=>$project));
        }
	}
	public function getAdd(){
		return view('home.addemail');
	}
	public function postAdd(Request $request){
    	$rules = [
            'upload' =>'required',
            'name' =>'required|max:49',
            'description' =>'max:99',
        ];
    	$messages = [
            'upload.required' => 'File upload là trường bắt buộc',
            'name.required' => 'Tên là trường bắt buộc',
            'name.max' => 'Tên quá dài',
            'description.max' => 'Mô tả quá dài',
        ];
    	$validator = Validator::make($request->all(), $rules, $messages);
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}else{
            $name = $request->input('name');
            $description = $request->input('description');
            $allowedFileType = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel'];
            if(in_array($_FILES["upload"]["type"],$allowedFileType)){
                $Path = 'file-excel/'.$_FILES['upload']['name'];
                if(move_uploaded_file($_FILES['upload']['tmp_name'], $Path)){
                    if ( $xlsx = SimpleXLSX::parse( $Path ) ) {
                        //strart project
                        $project_id = DB::table('project')->insertGetId([ 
                            'user_id' => Auth::user()->id,
                            'name' => $name,
                            'description' => $description,
                            'status' => 0,
                        ]);
                        //strart project_column
                        list( $cols, ) = $xlsx->dimension();
                        foreach ( $xlsx->rows() as $k => $r ) {
                            if ($k <= 3) continue; // skip first row
                                //save to database
                                DB::table('project_column')->insert([ 
                                    'project_id' => $project_id,
                                    'customer_code' => $r[1],
                                    'bank_code' => $r[2],
                                    'customer_email' => $r[3],
                                    'fullname' => $r[4],
                                    'price' => $r[5],
                                    'bank_name' => $r[6],
                                    'content' => $r[7],
                                    'file_name' => $r[8],
                                ]);

                            }
                        return redirect('/send-mail/edit/'.$project_id)->withProjectID($project_id)->withSuccess('Tải lên thành công !');
                    }else{
                        $errors = "Không thể đọc file";
                    }
                }else{
                    $errors = "Không thể lưu file. Vui lòng liên hệ với quản trị";
                }
            }else{
                $errors = "Sai định dạng file. File phải có định dạng Excel";
                
            }
            if(isset($errors))return redirect()->back()->withErrors($errors);

    	}
	}
    public function getEdit(Request $request,$id){
        // delete
        if($request->input('delete')){
            $project_column = DB::table('project_column')->where('id', $request->input('delete'))->first();
            if($project_column){
                if(DB::table('project')->where('id', $project_column->project_id)->where('user_id', Auth::User()->id)->exists()){
                    DB::table('project_column')->where('id',$request->input('delete'))->delete();
                    return redirect()->back()->withSuccess('Xóa thành công');
                }else{
                    return redirect()->back()->withErrors('Không thể xóa');
                }
            }else{
                return redirect()->back()->withErrors('Không thể xóa');
            }

        }else{
            $project =  DB::table('project')->where('id', $id)->first();
            if($project->user_id == Auth::User()->id){
                $project_column = DB::table('project_column')->where('project_id', $id)->orderBy('id', 'desc')->get();
                return view::make('home.editemail',array('id' => $id,'project_column' => $project_column,'status'=> $project->status,'name' =>$project->name));
            }else{
                return redirect('send-mail/')->withErrors('Bạn không thể sửa bạn ghi này.');
            }
        }




    }
    public function postEditAdd($id){

    }
}