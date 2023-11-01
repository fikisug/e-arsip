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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!auth()->check()) return redirect('/login');
        if (auth()->user()->role == 'admin') {
            return redirect('/dashboardAdmin');
        } else if (auth()->user()->role == 'user') {
            return redirect('/dashboardUser');
        } else {
            return redirect('/login');
        }
    }

    public function landing()
    {
        return view('home');
    }
}
