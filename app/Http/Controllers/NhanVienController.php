<?php



namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\MessageBag;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Auth;

use Validator;

use App\User;
use App\Salary;
use App\SalaryCol;
use View;







class NhanVienController extends Controller{

    public function getProfile(Request $request) {

        $salary_user = Salary::where('id_nv',Auth::User()->id_nv)->get();

        return view('nhanvien.profile',array('salary_user' => $salary_user));

    }

    public function postProfile(Request $request) {

        if($request->input('name')){

            $rules = [

                'name' => 'required|max:50',

                'email' => 'required|email|max:50',

                'description' => 'max:255',

            ];

            $messages = [

                'name.required' =>'Tên là trường bắt buộc',

                'name.max' =>'Tên quá dài',

                'email.required' => 'Email là trường bắt buộc',

                'email.email' => 'Định dạng email không chính xác',

                'description.max' => 'Mô tả quá dài',

            ];

            $validator = Validator::make($request->all(), $rules, $messages);



            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();

            } else {

                User::find(Auth::User()->id)->update([

                    'name' => $request->input('name'),

                    'email' => $request->input('email'),

                    'description' => $request->input('description')

                ]);

                $Success = 'Thay đổi thành công';

                return redirect()->back()->withSuccess($Success);

            }



        }elseif($request->input('password')){

            $rules = [

                'password' => 'required',

                'newpassword' => 'required',

                'newpasswordconfirm' => 'same:newpassword',

            ];

            $messages = [

                'password.required' =>'Mật khẩu là trường bắt buộc',

                'newpassword.required' =>'Mật khẩu mới là trường bắt buộc',

                'newpasswordconfirm.same' => 'Nhập lại mật khẩu mới không chính xác',

            ];

            $validator = Validator::make($request->all(), $rules, $messages);



            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();

            } else {

                if(Hash::check($request->input('password'),Auth::User()->password)){

                    User::find(Auth::User()->id)->update([

                        'password' => bcrypt($request->input('newpassword')),


                    ]);

                    $Success = 'Thay đổi thành công';

                    return redirect()->back()->withSuccess($Success);

                }else{

                    return redirect()->back()->withErrors('Mật khẩu cũ không chính xác');

                }

            }

        }else{



        }



    }

    public function getBangLuong(Request $request) {
        $getmonth =  $request->input('month');
        $month = Salary::select('month')->groupBy('month')->get();
        $salary_col = SalaryCol::orderBy('salary_col')->get();
        $salary_col_count = count($salary_col);
        $salaries = Salary::where('id_nv', Auth::User()->id_nv)->where('month', $getmonth)->get();
        return view('nhanvien.bangluong', compact('getmonth', 'month', 'salaries', 'salary_col'));
        

    }
}