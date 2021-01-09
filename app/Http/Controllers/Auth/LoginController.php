<?php

namespace App\Http\Controllers\Auth;
use Hash;
use Mail;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;



class LoginController extends Controller {
	public function viewLogin() {
		if (Auth::check()) {
			return redirect()->intended('/');
		} else {
			return view('login.login');
		}
	}
	public function CheckLogin(Request $request) {
		if (Auth::check()) {
			return redirect()->intended('/');
		} else {
			$rules = [
				'user_login' => 'required|numeric',
				'user_password' => 'required',
			];
			$messages = [
				'user_login.required' => 'Mã nhân viên là trường bắt buộc',
				'user_login.numeric' => 'Mã nhân viên là 6 số',
				'user_password.required' => 'Mật khẩu là trường bắt buộc',
			];
			$validator = Validator::make($request->all(), $rules, $messages);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			} else {
				if(strlen($request->user_login) !=6 ){
					return redirect()->back()->withInput()->withErrors('Mã nhân viên là 6 số');
				}
				$form = $request->all();
				$remember = (isset($form['remember'])) ? 1 : 0;
				if(User::where('id_nv', $form['user_login'])->exists() and  User::where('id_nv', $form['user_login'])->first('status')->status == 1){
					if (Auth::attempt(
						['id_nv' => $form['user_login'],
						'password' => $form['user_password']],
						$remember
					)){
						User::where('id_nv', $form['user_login'])->update([
							'ip_adress' => request()->ip(),
							'login_at' => Carbon::now('Asia/Ho_Chi_Minh'),
						]);
						return redirect('/')->with('info', 'IT WORKS!');
					}else{
						$error = ['Mã nhân viên hoặc mật khẩu không chính xác.', 'user_login'=>'','password'=>''];
						return redirect()->back()->withInput()->withErrors($error);
					}

				}else{
					$error = 'Tài khoản không tồn tại hoặc đã bị khóa';
					return redirect()->back()->withInput()->withErrors($error);
				}
			}
		}
	}

	public function ChangePassword(Request $request){
		$rules = [
			'new_password' => 'required|min:6',
			'confirm_password' => 'required|same:new_password',
		];
		$messages = [
			'new_password.min' => 'Mật khẩu mới phải lớn hơn 6 ký tự',
			'confirm_password.same' => 'Nhập lại mật khẩu không giống nhau',
		];
		$validator = Validator::make($request->all(), $rules, $messages);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$form = $request->all();
			User::find(Auth::id())->update([
				'first_login'	=> 0,
				'password'		=> bcrypt($form['new_password']),
			]);
			return redirect()->back()->with('info','Đổi mật khẩu thành công');

		}
	}

	public function getForgotPassword(Request $request) {
		if (Auth::check()) {
			return redirect()->intended('/');
		} else {

			return view('login.forgotpassword');
		}
	}

	public function postForgotPassword(Request $request) {
		if (Auth::check()) {
			return redirect()->intended('/');
		}else{
			if(User::where('email', $request->email)->exists()){
				$user = User::where('email', $request->email)->first();
				if($user->reset_password == null){
					$random = Str::random(20);
					User::find($user->id)->update(array('reset_password'  => $random));
					$user['reset_password'] = $random;
				}
			    Mail::to($user->email)->send(new \App\Mail\MailFotgotpassword($user));
				if (Mail::failures()) {
					return redirect()->back()->withInput()->with('error', 'Xin lỗi! Vui lòng thủ lại sau.');
				}else{
					return redirect()->route('mailsuccess');
				}
			}else{
				return redirect()->back()->withInput()->withErrors('Email không tồn tại');
			}
		}
	}
	
	public function MailSuccess(){
		return view('login.mail-success');
	}
	public function resetPassword($reset_password){
		if (Auth::check()) {
			return redirect()->intended('/');
		}else{
			if(User::where('reset_password', $reset_password)->exists()){
				$user = User::where('reset_password', $reset_password)->first();
				return view('login.resetpassword', compact('reset_password', 'user'));	
			}else{
				return redirect()->intended('/');
			}
		}
	}
	public function PostresetPassword(Request $request){
		if (Auth::check()) {
			return redirect()->intended('/');
		} else {
			if(User::where('reset_password', $request->resetpassword)->exists()){
				$rules = [
					'resetpassword'	=> 'required',
					'password' => 'required|min:6',
					'confirm_password' => 'required|same:password',
				];
				$messages = [
					'resetpassword.required'	=> 'Lỗi !',
					'password.required' => 'Mật khẩu mới là trường bắt buộc',
					'password.min' => 'Mật khẩu mới phải lớn hơn 6 ký tự',
					'confirm_password.same' => 'Nhập lại mật khẩu không giống nhau',
				];
				$validator = Validator::make($request->all(), $rules, $messages);
				if ($validator->fails()) {
					return redirect()->back()->withErrors($validator)->withInput();
				} else {
					User::where('reset_password', $request->resetpassword)
						->update(['password' => bcrypt($request->password), 'reset_password' => null]);
					return redirect()->route('login')->with('info','Đổi mật khẩu thành công. Hãy đăng nhập !');
				}
			}
		}
	}
	public function logout() {
		Auth::logout();
		return redirect()->intended('/login');
	}
}
