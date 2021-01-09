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
use Illuminate\Support\Facades\Input;

class HelpController extends Controller {

	public function getView() {
		return view('help.help', array());

	}
}