<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (auth()->user()->rol="admin") {
        return redirect()->to('admin');
      }
      if (auth()->user()->rol="cliente") {
        return redirect()->to('cliente');
      }
      if (auth()->user()->rol="visita") {
        return redirect()->to('visita');
      }
        return view('home');
    }
}
