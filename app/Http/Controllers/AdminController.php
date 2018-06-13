<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('editor')->only(['editor']);
        $this->middleware('admin')->only(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $user = auth()->guard('admin')->user();
        return view('admin.profile', compact('user'));
    }

    public function editor()
    {   
        $user = auth()->guard('admin')->user();
        return view('admin.editor', compact('user'));
    }

    public function bothRoles()
    {   
        $user = auth()->guard('admin')->user();
        return view('admin.both', compact('user'));
    }


}
