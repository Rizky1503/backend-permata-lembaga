<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckFlag
{
    public function handle($request, Closure $next)
    {
    	$data = User::where('id', Auth::user()->id)->first();
        if ($data->flag == "Admin") {
            return $next($request);
        }else{
            if($data->tempat_lahir == "" || $data->tempat_lahir == "" || $data->tanggal_lahir == "" || $data->jenis_kelamin == "" || $data->no_telp == "" || $data->alamat == "" || $data->jenis_institute == "" || $data->nama_institute == "" || $data->profesi == "" || $data->sk_profesi == "" || $data->jumlah_user_register == "" || $data->work == "" || $data->source_of_income == "" || $data->source_of_monthly == ""){
        
                return redirect()->route('Dashboard.Myprofile')->with('error','Please Complete Your Profile');
            }else{
                return $next($request);
            }            
        }

    }
}