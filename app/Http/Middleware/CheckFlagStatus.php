<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckFlagStatus
{
    public function handle($request, Closure $next)
    {
    	$data = User::where('id', Auth::user()->id)->first();
        if ($data->status_flag == "Aktif") {
            return $next($request);            
        }elseif ($data->status_flag == "Belum-Aktif") {
            return redirect()->route('Dashboard.Notice')->with('error','Your account is not active');
        }else{
            return redirect()->route('Dashboard.Notice')->with('error','Your account is inactive');
        }
    }
}