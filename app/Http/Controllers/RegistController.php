<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistController extends Controller
{    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registKoordinator()
    {
        return view('home');
    }
}
