<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\locations\Location;
use App\Models\services\Service;
use App\Models\User;
use App\Models\job\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class DashboardController extends Controller
{
    function index()
    {
        $users = User::get();
        $amenities = DB::table('amenities')->count();
        $testimonials = DB::table('testimonials')->count();
        $abouts = DB::table('abouts')->count();
        $faqs = DB::table('faqs')->count();
        $home = DB::table('home')->count();
        $locations = Location::count();
        $services = Service::count();
        $why = DB::table('why')->count();
        $inquiry = DB::table('inquiry')->count();
        $contact = DB::table('contact')->count();

        $jobs = Job::count();

        return view('dashboard.dashboard', compact('inquiry', 'contact', 'jobs', 'why', 'services', 'locations', 'home', 'users', 'amenities', 'testimonials', 'abouts', 'faqs'));
    }
    function account()
    {
        $id = auth()->user()->id;
        $user = User::with('role')->where('id', $id)->first();

        return view('dashboard.acount', compact('user'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'filter' => 'in:today,all_date,yesterday,this_week,last_week,this_month,last_month'
        ]);
        // dd(Carbon::now()->subMonth()->month);
        $data = $request->filter;
        switch ($data) {
            case 'today':
                $why = DB::table('why')->whereDate('created_at', Carbon::today())->count();
                $home = DB::table('home')->whereDate('created_at', Carbon::today())->count();
                $amenities = DB::table('amenities')->whereDate('created_at', Carbon::today())->count();
                $testimonials = DB::table('testimonials')->whereDate('created_at', Carbon::today())->count();
                $faqs = DB::table('faqs')->whereDate('created_at', Carbon::today())->count();
                $abouts = DB::table('abouts')->whereDate('created_at', Carbon::today())->count();
                $services = Service::whereDate('created_at', Carbon::today())->count();
                $locations = Location::whereDate('created_at', Carbon::today())->count();
                $jobs = Job::whereDate('created_at', Carbon::today())->count();
                $inquiry = DB::table('inquiry')->whereDate('created_at', Carbon::today())->count();
                $contact = DB::table('contact')->whereDate('created_at', Carbon::today())->count();

                break;
            case 'yesterday':
                $why = DB::table('why')->whereDate('created_at', Carbon::yesterday())->count();
                $home = DB::table('home')->whereDate('created_at', Carbon::yesterday())->count();
                $amenities = DB::table('amenities')->whereDate('created_at', Carbon::yesterday())->count();
                $testimonials = DB::table('testimonials')->whereDate('created_at', Carbon::yesterday())->count();
                $faqs = DB::table('faqs')->whereDate('created_at', Carbon::yesterday())->count();
                $abouts = DB::table('abouts')->whereDate('created_at', Carbon::yesterday())->count();
                $services = Service::whereDate('created_at', Carbon::yesterday())->count();
                $locations = Location::whereDate('created_at', Carbon::yesterday())->count();
                $inquiry = DB::table('inquiry')->whereDate('created_at', Carbon::yesterday())->count();
                $contact = DB::table('contact')->whereDate('created_at', Carbon::yesterday())->count();
                $jobs = Job::whereDate('created_at', Carbon::yesterday())->count();
                break;

            case 'all_date':
                $amenities = DB::table('amenities')->count();
                $testimonials = DB::table('testimonials')->count();
                $abouts = DB::table('abouts')->count();
                $faqs = DB::table('faqs')->count();
                $home = DB::table('home')->count();
                $locations = Location::count();
                $services = Service::count();
                $why = DB::table('why')->count();
                $jobs = Job::count();
                $inquiry = DB::table('inquiry')->count();
                $contact = DB::table('contact')->count();
                break;
            case 'this_week':
                $why = DB::table('why')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $home = DB::table('home')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $amenities = DB::table('amenities')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $testimonials = DB::table('testimonials')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $faqs = DB::table('faqs')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $abouts = DB::table('abouts')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $services = Service::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $locations = Location::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $inquiry = DB::table('inquiry')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $contact = DB::table('contact')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

                $jobs = Job::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                break;
            case 'last_week':
                $why = DB::table('why')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $home = DB::table('home')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $amenities = DB::table('amenities')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $testimonials = DB::table('testimonials')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $faqs = DB::table('faqs')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $abouts = DB::table('abouts')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $services = Service::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $locations = Location::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $inquiry = DB::table('inquiry')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $contact = DB::table('contact')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                $jobs = Job::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
                break;
            case 'last_month':
                $why = DB::table('why')->whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $home = DB::table('home')->whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $amenities = DB::table('amenities')->whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $testimonials = DB::table('testimonials')->whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $faqs = DB::table('faqs')->whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $abouts = DB::table('abouts')->whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $services = Service::whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $locations = Location::whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)->count();
                $inquiry = DB::table('inquiry')->whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $contact = DB::table('contact')->whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                $jobs = Job::whereMonth('created_at', '>=', Carbon::now()->subMonth())->count();
                break;
            case 'this_month':
                $why = DB::table('why')->whereMonth('created_at', Carbon::now()->month)->count();
                $home = DB::table('home')->whereMonth('created_at', Carbon::now()->month)->count();
                $amenities = DB::table('amenities')->whereMonth('created_at', Carbon::now()->month)->count();
                $testimonials = DB::table('testimonials')->whereMonth('created_at', Carbon::now()->month)->count();
                $faqs = DB::table('faqs')->whereMonth('created_at', Carbon::now()->month)->count();
                $abouts = DB::table('abouts')->whereMonth('created_at', Carbon::now()->month)->count();
                $services = Service::whereMonth('created_at', Carbon::now()->month)->count();
                $locations = Location::whereMonth('created_at', Carbon::now()->month)->count();
                $inquiry = DB::table('inquiry')->whereMonth('created_at', Carbon::now()->month)->count();
                $contact = DB::table('contact')->whereMonth('created_at', Carbon::now()->month)->count();
                $jobs = Job::whereMonth('created_at', Carbon::now()->month)->count();
                break;
        }

        return view('dashboard.dashboard', compact('jobs', 'contact', 'inquiry', 'why', 'services', 'locations', 'home', 'amenities', 'testimonials', 'abouts', 'faqs'));
    }
}
