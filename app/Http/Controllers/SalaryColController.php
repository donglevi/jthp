<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\MessageBag;

use Illuminate\Http\Request;

use App\Excel\SimpleXLSX;

use Auth;
use App\User;
use App\SalaryCol;
use Redirect,Response;
use DataTables;
use View;







class SalaryColController extends Controller{

    public function getView(){
        if(request()->ajax()) {
            return Datatables()->of(SalaryCol::select('*'))
            ->addColumn('checkbox', 'button.checkbox') // khai báo cột với đường đẫn button_tick.blae.php
            ->addColumn('action', 'button.action')
            ->rawColumns(['checkbox','action']) // add cột đã khai báo
            ->addIndexColumn()
            ->make(true);
        }
        return view('salarycol.view');
    }

    public function AddOrUpdate(Request $request){ // ADD
        $salary_col = $request->input('salary_col');
        $id = $request->id;
        $result['error'] = 1;
        if(isset($id)){ // update
            $data = [
                'salary_col'          => $request->salary_col,
                'salary_value'         => $request->salary_value,
            ];
            $SalaryCol = SalaryCol::find($id);
            $SalaryCol->update($data);
            $result['error'] = 0;
            $result['message'] = 'Sửa thành công';
        }else{ // add
            if(SalaryCol::where('salary_col',$salary_col)->exists()){
                $result['message']= 'Đã tồn tại thứ tự cột.';
            }else{
                $data = [
                    'salary_col'          => $request->salary_col,
                    'salary_value'         => $request->salary_value,
                ];
                SalaryCol::create($data);
                $result['error'] = 0;
                $result['message'] = 'Thêm thành công';
                
            }
        }
        return $result;
        //return Response::json($result);
    }

    public function edit($id){
        $SalaryCol = SalaryCol::find($id);
        return Response::json($SalaryCol);
    }
    public function destroy($id){
        $SalaryCol = SalaryCol::find($id);
        $SalaryCol->delete();
        $result['error'] = 0;
        $result['message'] = 'Xóa thành công';
        return Response::json($result);
    }


}