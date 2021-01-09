<?php



namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\MessageBag;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Excel\SimpleXLSX;

use Carbon\Carbon;

use Mail;

use Auth;

use Validator;

use App\User;

use View;







class WorkController extends Controller{



    public function getView(Request $request) {

        if($request->input('delete')){
            $deletes = $request->input('delete');
            foreach (explode("-", $deletes) as $key => $id) {
                DB::table('work')->where('id',$id)->delete();
            }
            return redirect()->back()->withSuccess('Xóa thành công');
        }else{

            $work = DB::table('work')->orderBy('id', 'desc')->get();

            $work_col = DB::table('work_col')->orderBy('work_col')->get();

            $workcol = array();

            foreach ($work_col as $key => $col) {

                $workcol += array($col->work_col => $col->work_value);

            }

            return view('work.view',array('works'=>$work,'workcol'=>$workcol));

        }

    }

    public function getAdd(){

        $work_col = DB::table('work_col')->orderBy('work_col')->get();

        $workcol = array();

        foreach ($work_col as $key => $col) {

            $workcol += array($col->work_col => $col->work_value);

        }

        return view('work.add',array('workcol'=>$workcol));

    }

    public function postAdd(Request $request){

        $rules = [

            'id_nv' => 'required',

            'month' => 'required',

        ];

        $messages = [

            'id_nv.required' =>'Mã nhân viên là trường bắt buộc',

            'month.required' =>'Tháng là trường bắt buộc',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        } else {



            if(DB::table('work')->where('id_nv',$request->input('id_nv'))->where('month',$request->input('month'))->exists()){

                $Errors = $request->input('id_nv').' trùng dữ liệu tháng '.$request->input('month');

                return redirect()->back()->withErrors($Errors)->withInput();

            }else{
                $data = [
                    'id_nv' => $request->input('id_nv'),
                    'month' => $request->input('month'),
                    'updated_at' => Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->toDateTimeString(),
                ];
                for ($i=1; $i < 80; $i++) { if($i < 10){$i = '0'.$i;}
                    $data += ['c'.$i => $request->input('c'.$i),];
                }
                DB::table('work')->insert($data);
                $Success = $request->input('work').' đã được thêm';
                return redirect()->intended('/work')->withSuccess($Success);

            }

        }

    }

    public function getEdit(Request $request,$id){

        $work = DB::table('work')->where('id', $id)->orderBy('id', 'desc')->first();

            $work_col = DB::table('work_col')->orderBy('work_col')->get();

            $workcol = array();

            foreach ($work_col as $key => $col) {

                $workcol += array($col->work_col => $col->work_value);

            }

        return view('work.edit',array('work'=>$work,'workcol'=>$workcol));

    }

    public function postEdit(Request $request,$id){

        $rules = [

            'id_nv' => 'required',

            'month' => 'required',

        ];

        $messages = [

            'id_nv.required' =>'Mã nhân viên là trường bắt buộc',

            'month.required' =>'Tháng là trường bắt buộc',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $data = [
                'updated_at' => Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->toDateTimeString(),
            ];
            for ($i=1; $i < 80; $i++) { if($i < 10){$i = '0'.$i;}
                $data += ['c'.$i => $request->input('c'.$i),];
            }
            DB::table('work')->where('id',$id)->update($data);
            return redirect()->intended('/work')->withSuccess('Thay đổi thành công.');

        }

    }



    public function getImport(){

        return view('work.import');

    }

    public function postImport(Request $request){

        $rules = ['upload' =>'required','month' =>'required',];

        $messages = ['upload.required' => 'File upload là trường bắt buộc','month.required' => 'Tháng là trường bắt buộc',];

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        }else{

            $allowedFileType = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel'];

            if(in_array($_FILES["upload"]["type"],$allowedFileType)){

                $Path = 'import/work/'.$_FILES['upload']['name'];

                if(move_uploaded_file($_FILES['upload']['tmp_name'], $Path)){

                    if ( $xlsx = SimpleXLSX::parse( $Path ) ) {

                        //strart project_column

                        list( $cols, ) = $xlsx->dimension();

                        $errors = array();

                        foreach ( $xlsx->rows() as $k => $r ) {

                            if ($k <= 6) continue; // skip first row

                                //save to database

                            if(DB::table('work')->where('id_nv',$r[1])->where('month',$request->input('month'))->exists()){
                                array_push($errors,$r[0].' Trùng lặp');continue;
                            }else{
                                $data = [
                                    'month' => $request->input('month'),
                                    'id_nv' => $r[1],
                                    'updated_at' => Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->toDateTimeString(),
                                ];
                                for ($i=1; $i < 80; $i++) { if($i < 10){$j = 'c0'.$i;}else{$j = 'c'.$i;}
                                    $data += [$j   => trim(preg_replace('/\s+/', ' ',$r[$i+1]))];

                                }
                                DB::table('work')->insert($data);
                            }

                        }

                        if(isset($errors)){

                            return redirect('/work')->withSuccess('Tải lên thành công !')->withErrors($errors);

                        }else{

                            return redirect('/work')->withSuccess('Tải lên thành công !');

                        }

                        

                    }else{

                        $errors = "Không thể đọc file";

                        return redirect('/work')->withErrors($errors);

                    }

                }else{

                    $errors = "Không thể lưu file. Vui lòng liên hệ với quản trị";

                    return redirect('/user')->withErrors($errors);

                }

            }else{

                $errors = "Sai định dạng file. File phải có định dạng Excel";

                return redirect('/user')->withErrors($errors);

                

            }



        }

    }

}