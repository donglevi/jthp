<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\MessageBag;

use Illuminate\Http\Request;

use App\Excel\SimpleXLSX;

use Carbon\Carbon;

use Mail;

use Auth;

use Validator;

use App\User;
use App\Salary;
use App\SalaryCol;
use View;


class SalaryController extends Controller{

    public function getView(Request $request) {

        if($request->input('delete')){
            $deletes = $request->input('delete');
            foreach (explode("-", $deletes) as $key => $id) {
                Salary::find($id)->delete();
            }
            return redirect()->back()->withSuccess('Xóa thành công');
        }else{
            $salary = Salary::get();
            $salary_col = SalaryCol::get();
            $salary_col_count = count($salary_col) + 1;
            $salarycol = array();

            foreach ($salary_col as $key => $col) {
                $salarycol += array($col->salary_col => $col->salary_value);
            }
            return view('salary.view',array('salarys'=>$salary,'salarycol'=>$salarycol,'salary_col_count' => $salary_col_count));

        }

    }

    public function getAdd(){

        $salary_col = SalaryCol::get();

        $salarycol = array();

        foreach ($salary_col as $key => $col) {

            $salarycol += array($col->salary_col => $col->salary_value);

        }

        return view('salary.add',array('salarycol'=>$salarycol));

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



            if(Salary::where('id_nv',$request->input('id_nv'))->where('month',$request->input('month'))->exists()){

                $Errors = $request->input('id_nv').' trùng dữ liệu tháng '.$request->input('month');

                return redirect()->back()->withErrors($Errors)->withInput();

            }else{
                $data = [
                    'id_nv' => $request->input('id_nv'),
                    'month' => $request->input('month'),
                ];
                for ($i=1; $i < 80; $i++) { if($i < 10){$i = '0'.$i;}
                    $data += ['c'.$i => $request->input('c'.$i),];
                }
                Salary::create($data);
                $Success = $request->input('salary').' đã được thêm';
                return redirect()->intended('/salary')->withSuccess($Success);

            }

        }

    }

    public function getEdit($id){
        $salary = Salary::where('id', $id)->first();
            $salary_col = SalaryCol::get();
            $salarycol = array();
            foreach ($salary_col as $key => $col) {

                $salarycol += array($col->salary_col => $col->salary_value);
            }
        return view('salary.edit',array('salary'=>$salary,'salarycol'=>$salarycol));
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
            Salary::find($id)->update($data);
            return redirect()->intended('/salary')->withSuccess('Thay đổi thành công.');

        }

    }



    public function getImport(){
        return view('salary.import');
    }

    public function postImport(Request $request){

        $rules = ['upload' =>'required','month' =>'required',];

        $messages = ['upload.required' => 'File upload là trường bắt buộc','month.required' => 'Tháng là trường bắt buộc',];

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        }else{
            $salary_col_count = SalaryCol::count() + 1;
            $allowedFileType = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel'];

            if(in_array($_FILES["upload"]["type"],$allowedFileType)){

                $Path = 'import/salary/'.$_FILES['upload']['name'];

                if(move_uploaded_file($_FILES['upload']['tmp_name'], $Path)){

                    if ( $xlsx = SimpleXLSX::parse( $Path ) ) {

                        //strart project_column

                        list( $cols, ) = $xlsx->dimension();

                        $errors = array();

                        foreach ( $xlsx->rows() as $k => $r ) {

                            if ($k <= 6) continue; // skip 6 row

                                //save to database

                            if(Salary::where('id_nv',$r[1])->where('month',$request->input('month'))->exists()){
                                array_push($errors,$r[0].' Trùng lặp');continue;
                            }else{
                                $data = [
                                    'month' => $request->input('month'),
                                    'id_nv' => $r[1],
                                ];
                                for ($i=1; $i < $salary_col_count; $i++) { if($i < 10){$j = 'c0'.$i;}else{$j = 'c'.$i;}
                                    $data += [$j   => trim(preg_replace('/\s+/', ' ',$r[$i+1]))];

                                }
                                Salary::create($data);
                            }

                        }

                        if(isset($errors)){

                            return redirect('/salary')->withSuccess('Tải lên thành công !')->withErrors($errors);

                        }else{

                            return redirect('/salary')->withSuccess('Tải lên thành công !');

                        }

                        

                    }else{

                        $errors = "Không thể đọc file";

                        return redirect('/salary')->withErrors($errors);

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