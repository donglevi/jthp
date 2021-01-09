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







class WorkColController extends Controller{



    public function getView(Request $request) {

    	if($request->input('delete')){
            $delete = $request->input('delete');
            foreach (explode("-", $delete) as $key => $id) {
                DB::table('work_col')->where('id',$id)->delete();
            }
            return redirect()->back()->withSuccess('Xóa thành công');
    	}else{

			$work_col = DB::table('work_col')->orderBy('id', 'desc')->get();

			return view('workcol.view',array('work_col'=>$work_col));

    	}

    }

    public function getAdd(){

        return view('workcol.add');

    }

    public function postAdd(Request $request){

        $rules = [

            'work_col' => 'required',

            'work_value' =>'required',

        ];

        $messages = [

            'work_col.required' =>'Thứ tự cột là trường bắt buộc',

            'work_value.required' => 'Giá trị là trường bắt buộc',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        } else {



            if(DB::table('work_col')->where('work_col',$request->input('work_col'))->exists()){

                return redirect()->back()->withErrors('Trùng thứ tự cột')->withInput();

            }else{

                DB::table('work_col')->insert([

                    'work_col' => $request->input('work_col'),

                    'work_value' => $request->input('work_value'),

                    'updated_at' => Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->toDateTimeString(),

                ]);

                $Success = $request->input('work_col').' đã được thêm';

                return redirect()->intended('/work/col')->withSuccess($Success);

            }

        }

    }

    public function getEdit(Request $request,$id){

		$work_col = DB::table('work_col')->where('id', $id)->orderBy('id', 'desc')->first();

		return view('workcol.edit',array('data'=>$work_col));

    }

    public function postEdit(Request $request,$id){

        $rules = [

            'work_col' => 'required',

            'work_value' =>'required',

        ];

        $messages = [

            'work_col.required' =>'Thứ tự cột là trường bắt buộc',

            'work_value.required' => 'Giá trị là trường bắt buộc',

        ];

    	$validator = Validator::make($request->all(), $rules, $messages);



    	if ($validator->fails()) {

    		return redirect()->back()->withErrors($validator)->withInput();

    	} else {

            // if(DB::table('work_col')->where('work_col',$request->input('work_col'))->exists()){

            //     return redirect()->back()->withErrors('Trùng thứ tự cột')->withInput();

            // }else{

                $update = [

                    'work_col' => $request->input('work_col'),

                    'work_value' => $request->input('work_value'),

                    'updated_at' => Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->toDateTimeString(),

                ];

                DB::table('work_col')->where('id', $id)->update($update);

                return redirect()->intended('/work/col')->withSuccess('Thay đổi thành công.');

                //}

    	}

    }

}