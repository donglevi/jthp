<?php
namespace App\Http\Controllers;
use Mail;
use Auth;
use Validator;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class SettingsController extends Controller{
	public function getView(){
		$settings = DB::table('settings')->get();
		return view('settings.view', array('settings' => $settings));
	}
	public function postView(Request $request){
		echo $request->file('logo');
		if($request->has('logo')){
			echo 'có logo';
		}else{
			echo 'k có logo';
		}
		// if($request->hasFile('favicon')){
		// 	$allowed=['jpg','png','ico'];
		// 	$favicon = $request->file('favicon');
		// 	$favicon_name = $request->file('favicon')->getClientOriginalName();
		// 	$favicon_ext = $request->file('favicon')->getClientOriginalExtension();
		// 	$check=in_array($favicon_ext,$allowed);
		// 	if($check){
		// 		$favicon->move('upload', $favicon_name);
		// 		DB::table('settings')->where('settings_name', 'favicon')->update([
		//         'settings_value'     => 'upload/'.$favicon_name,
		// 		]);
		// 	}else{
		// 		$error = new MessageBag('Favicon sai định dạng file');
		// 	}
		// }
		
		// if($request->input('webname')){
		// 	DB::table('settings')->where('settings_name', 'webname')->update([
	 //        'settings_value'     => $request->input('webname'),
		// 	]);
		// }
		// if($request->input('webdescription')){
		// 	DB::table('settings')->where('settings_name', 'webdescription')->update([
	 //        'settings_value'     => $request->input('webdescription'),
		// 	]);
		// }
		// if($request->input('admin_email')){
		// 	DB::table('settings')->where('settings_name', 'admin_email')->update([
	 //        'settings_value'     => $request->input('admin_email'),
		// 	]);
		// }
		// if($request->input('send_email')){
		// 	DB::table('settings')->where('settings_name', 'send_email')->update([
	 //        'settings_value'     => $request->input('send_email'),
		// 	]);
		// }
		// if($request->input('send_email_name')){
		// 	DB::table('settings')->where('settings_name', 'send_email_name')->update([
	 //        'settings_value'     => $request->input('send_email_name'),
		// 	]);
		// }
		// if($request->input('send_email_smtp')){
		// 	DB::table('settings')->where('settings_name', 'send_email_smtp')->update([
	 //        'settings_value'     => $request->input('send_email_smtp'),
		// 	]);
		// }
		// if($request->input('send_email_port')){
		// 	DB::table('settings')->where('settings_name', 'send_email_port')->update([
	 //        'settings_value'     => $request->input('send_email_port'),
		// 	]);
		// }
		// if($request->input('send_email_pass')){
		// 	DB::table('settings')->where('settings_name', 'send_email_pass')->update([
	 //        'settings_value'     => $request->input('send_email_pass'),
		// 	]);
		// }

		// if(isset($error)){
		// 	return redirect()->back()->with('error',$error);
		// }else{
		// 	return redirect()->back()->withSuccess('Đã lưu');
		// }

	}
}