<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    //
    function login()
    {
        if (!Session::has('loginId')) {
            return view('auth.login');
        } else
            return redirect()->route('dashboard');
    }
    function login_user(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->Session()->put('loginId', $user->id);
                $name = $user->name;

                return redirect()->route('dashboard');
            } else {
                return back()->with('error', 'wrong password');
            }
        } else {
            return back()->with('faild', 'email is not vaild');
        }
    }
    function admins()
    {
        if (Session::has('loginId')) {
            $user = User::where('id', Session::get('loginId'))->first();
            $users = User::get();
            return view('auth.admins', compact('user', 'users'));
        } else
            return redirect()->route('auth.login');
    }
    function create()
    {
        if (Session::has('loginId')) {
            $user = User::where('id', Session::get('loginId'))->first();
            return view('auth.create', compact('user'));
        }
    }
    function register(RegisterRequest $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $data = $user->save();
        if ($data) {
            return redirect()->route('auth.admins')->with('seccess', 'user created');
        } else {
            return back()->with('faild', 'faild to create user');
        }
    }
    function logout()
    {
        if (Session::has('loginId')) {

            Session::pull('loginId');

            return redirect()->route('auth.login');
        }
    }
    function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        return back();
    }
}
