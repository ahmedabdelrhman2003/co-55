<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\services\Service;
use App\Models\job\Job;

use App\Models\locations\Location;
use App\Models\locations\LocationsIcon;
use App\Models\locations\LocationsImage;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // function layout()
    // {
    //     $services = Service::select()->paginate(10);
    //     $locations = Location::select()->paginate(10);
    //     return view('layout_page', compact('locations', 'services'));
    // }
    public function home()
    {
        $homes = DB::table('home')->select()->where('activation', '=', '1')->paginate(10);
        $why = DB::table('why')->select()->where('activation', '=', '1')->paginate(10);
        $amenities = DB::table('amenities')->where('activation', '=', '1')->select()->get();
        $testimonials = DB::table('testimonials')->where('activation', '=', '1')->select()->get();
        $services = Service::select()->where('activation', '=', '1')->paginate(10);
        $locations = Location::select()->where('activation', '=', '1')->paginate(10);
        $testimonialsCount = DB::table('testimonials')->where('activation', '=', '1')->count();

        return view('pages.index', compact('locations', 'homes', 'why', 'amenities', 'testimonialsCount', 'testimonials', 'services'));
    }
    function services()
    {
        $services = Service::with('services_icons')->where('activation', '=', '1')->paginate(10);
        return view('pages.services', compact('services'));
    }
    function privacy()
    {
        $privacy = DB::table('privacy')->select()->first();
        return view('pages.privacy', compact('privacy'));
    }
    function location($id = null)
    {
        if ($id) {
            // dd($id);
            $location = Location::where('id', $id)->first();
            $icons = LocationsIcon::where('locations_id', $id)->get();
            $images = LocationsImage::where('locations_id', $id)->get();
            // dd($images);

            return view('pages.location_name', compact('location', 'icons', 'images'));
        } else {
            $locations = Location::where('activation', '=', '1')->paginate(10);
            return view('pages.location', compact('locations'));
        }
    }
    function about()
    {
        $abouts = DB::table('abouts')->select('description')->where('id', '=', 1)->first();
        $philosophy = DB::table('abouts')->select('description')->where('id', '=', 2)->first();

        return view('pages.abouts', compact('abouts', 'philosophy'));
    }
    function inquiry()
    {
        $locations = Location::paginate(10);
        $services = Service::select()->paginate(10);
        return view('pages.inquiry', compact('locations', 'services'));
    }
    function contact()
    {

        return view('pages.contact');
    }
    function job()
    {
        $titles = DB::table('job_titles')->select()->paginate(10);

        return view('pages.job', compact('titles'));
    }
    function career()
    {
        $titles = DB::table('job_titles')->select()->paginate(10);
        return view('pages.career', compact('titles'));
    }
}
