<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->tipo_usuario_id == 1)
        {
            return view('administrador.home');
        }
        elseif(Auth::user()->tipo_usuario_id == 2)
        {
            return view('fiscal.home');
        }
        else
        {
            return view('auth.login');
        }
    }
}
