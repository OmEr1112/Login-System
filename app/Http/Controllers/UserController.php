<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

  //protected $redirectTo = '/home';

  public function __construct() {
    $this->middleware('guest', ['only' => ['getSignup', 'getSignin']]);
    $this->middleware('auth', ['only' => ['home', 'getLogout']]);
  }





  public function home() {
    $user = auth()->user();
    return view('registration.profile', compact('user'));
  }



  public function getSignup() {
    return view('registration.register');
  }

  public function postSignup() {
    if(request()->input('submit')) {
      $this->validate(request(), [
        'name' => 'string|max:255',
        'email' => 'email|required|unique:users|max:255',
        'password' => 'required|min:4|confirmed'
      ]);

      $user = new User([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
      ]);

      $user->save();

      \Auth::login($user);

      // if (\Session::has('oldUrl')) {
      //   $oldUrl = \Session::get('oldUrl');
      //   \Session::forget('oldUrl');
      //   return redirect()->to($oldUrl);
      // }

      return redirect()->intended('home');
    }
  }



  public function getSignin() {
    return view('registration.login');
  }

  public function postSignin() {
    $signinInfo = request()->validate([
      'email' => 'email|required',
      'password' => 'required|min:4'
    ]);

    if (\Auth::attempt($signinInfo)) {
      // if (\Session::has('oldUrl')) {
      //   $oldUrl = \Session::get('oldUrl');
      //   \Session::forget('oldUrl');
      //   return redirect()->to($oldUrl);
      // }
      return redirect()->intended('home');
    }

    return redirect()->back();
  }



  public function reset() {
    return view('registration.resetPassword');
  }

  public function email() {
    return view('registration.email');
  }

  public function getLogout() {
    \Auth::logout();
    return redirect()->route('login');
  }
}
