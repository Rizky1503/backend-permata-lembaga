<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class AuthApi {

    public function handle($request, Closure $next){
    	if($request->session()->has('user')) {
	        return $next($request);            
        } else {
        	return redirect()->route('login')->with('error','Your account is inactive');
        }
    }
}