<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\Excel\SimpleXLSX;
use Auth;
use Validator;
use App\User;
use Redirect,Response;
use DataTables;

class UserController extends Controller{

    public function index(){
        if(request()->ajax()) {
            return Datatables()->of(User::select('*'))
            ->addColumn('checkbox', 'button.checkbox') // khai báo cột với đường đẫn button_tick.blae.php
            ->addColumn('action', 'button.action')
            ->addColumn('status', 'button.status')
            ->addColumn('level', 'button.level')
            ->addColumn('first_login', 'button.first_login')
            ->rawColumns(['checkbox','action', 'level','status','first_login']) // add cột đã khai báo
            ->addIndexColumn()
            ->make(true);
        }
        return view('user.view');
    }

    public function AddOrUpdate(Request $request){ // ADD USER
        $id_nv = $request->input('id_nv');
        $id = $request->id;
        $result['error'] = 1;
        if(isset($id)){ // update
                if(isset($request->level)){$level = $request->level;}else{$level = 0;}
                if(isset($request->status)){$status = 1;}else{$status = 0;}
                $data = [
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'level'         => $level,
                    'status'        => $status,
                ];
                if(isset($request->pass)){$data['password'] = bcrypt('jnt123');$data['first_login'] = 1;}
                $user = User::find($id);
                $user->update($data);
                $result['error'] = 0;
                $result['message'] = 'Sửa thành công';
        }else{ // add
            if(User::where('id_nv',$id_nv)->exists()){
                $result['message']= 'Đã tồn tại mã nhân viên';
            }elseif(strlen($id_nv) != 6){
                $result['message'] = 'Mã nhân viên có 6 ký tự';
            }else{
                if(isset($request->level)){$level = $request->level;}else{$level = 0;}
                if(isset($request->status)){$status = 1;}else{$status = 0;}
                $data = [
                    'id_nv'         => $id_nv,
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'level'         => $level,
                    'status'        => $status,
                ];
                if(isset($request->pass)){$data['password'] = bcrypt('jnt123');$data['first_login'] = 1;}
                User::create($data);
                $result['error'] = 0;
                $result['message'] = 'Thêm thành công: '.$id_nv;
                
            }
        }
        //return Response::json($data);
        return Response::json($result);
    }

    public function edit($id){  // edit user
        $user = User::find($id);
        return Response::json($user);
    }
    public function destroy($id){
        $user = User::find($id);
        if($id == Auth::User()->id){
            $result['message'] = 'Không thể xóa chính mình';
            $result['error'] = 1;
        }else{
            $user->delete();
            $result['error'] = 0;
            $result['message'] = 'Xóa thành công';
        }
        return Response::json($result);
    }
    public function getImport(){
        return view('user.import');
    }

    public function postImport(Request $request){
        $rules = ['upload' =>'required',];
        $messages = ['upload.required' => 'File upload là trường bắt buộc',];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $allowedFileType = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel'];

            if(in_array($_FILES["upload"]["type"],$allowedFileType)){
                $Path = 'import/user/'.$_FILES['upload']['name'];
                if(move_uploaded_file($_FILES['upload']['tmp_name'], $Path)){
                    if ( $xlsx = SimpleXLSX::parse( $Path ) ) {
                        //strart project_column
                        list( $cols, ) = $xlsx->dimension();
                        $errors = array();
                        foreach ( $xlsx->rows() as $k => $r ) {
                            if ($k <= 3) continue; // skip 0->3 line
                            //save to database
                            if(User::where('id_nv',$r[0])->exists()){
                                array_push($errors,$r[0].' Trùng lặp');
                                continue;
                            }else{
                                User::create([ 
                                    'id_nv' => $r[0],
                                    'name' => $r[1],
                                    'email' => $r[2],
                                    'status' => 1,
                                    'first_login' => 1,
                                    'level' => 0,
                                    'password' => bcrypt($r[3]),
                                ]);
                            }
                            if($r[0] == ''){
                                array_push($errors,'Rỗng');
                            }
                        }
                        if(isset($errors)){
                            return redirect('/user')->withSuccess('Tải lên thành công !')->withErrors($errors);
                        }else{
                            return redirect('/user')->withSuccess('Tải lên thành công !');
                        }
                    }else{

                        $errors = "Không thể đọc file";

                        return redirect('/user/import')->withErrors($errors);

                    }

                }else{

                    $errors = "Không thể lưu file. Vui lòng liên hệ với quản trị";

                    return redirect('/user/import')->withErrors($errors);

                }

            }else{

                $errors = "Sai định dạng file. File phải có định dạng Excel";

                return redirect('/user/import')->withErrors($errors);

                

            }



        }
    }

}