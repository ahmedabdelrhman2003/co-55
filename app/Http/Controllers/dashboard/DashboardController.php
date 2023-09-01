<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\locations\Location;
use App\Models\services\Service;
use App\Models\User;
use App\Models\job\Job;
use App\Models\job\JobsFile;





use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    function index()
    {

        $user = User::where('id', Session::get('loginId'))->first();
        $users = User::get();
        return view('dashboard.dashboard', compact('user', 'users'));
    }
    function account()
    {
        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.acount', compact('user'));
    }
}
