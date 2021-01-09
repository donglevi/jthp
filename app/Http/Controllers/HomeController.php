<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use Validator;
use App\User;
use App\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller{

    public function getView() {
    	if(Auth::User()->level == 1){ // admin
	    	$users_count = User::count();
	    	$salary_count = Salary::count();
	    	return view('home.dashboard',array('users_count' => $users_count,'salary_count' => $salary_count ));
    	}else{
            return redirect('/profile');
    	}

    }
}