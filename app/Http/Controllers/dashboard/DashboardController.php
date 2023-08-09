<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    function index()
    {
        if (Session::has('loginId')) {


            $user = User::where('id', Session::get('loginId'))->first();

            // dd($data);
            return view('dashboard.dashboard', compact('user'));
        }
    }
}
