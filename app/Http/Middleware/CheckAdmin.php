<?php

namespace App\Http\Middleware;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use Validator;
use Session;
use Closure;
use Auth;


class CheckAdmin{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::user()->level == 1){
            return $next($request);
        }else{
            return redirect('/profile')->withErrors('Bạn không có quyền !');
            
        }
    }
}
