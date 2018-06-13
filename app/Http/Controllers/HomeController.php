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
      $user = auth()->user();
        return view('registration.profile', compact('user'));
    }

    public function adminIndex()
    {   
      $user = auth()->user();
        return view('admin.profile', compact('user'));
    }
}
