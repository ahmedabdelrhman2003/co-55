<?php

namespace App\Http\Controllers\dashboard;

use App\Models\locations\Location;
use App\Models\locations\LocationsIcon;
use App\Models\locations\LocationsImage;


use App\Http\Requests\Requests\dashboard\SroreLocationRequest;

use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Http\traits\media;
use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\dashboard\StoreLocationRequest;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Session::has('loginId')) {
            $locations = Location::all();


            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.locations.index', compact('locations', 'user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Session::has('loginId')) {


            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.locations.create', compact('user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $data = $request->except('icon_name', 'image', 'icon_image', 'token', 'location_image');
        $photoName = $this->uploadPhoto($request->image, 'location');
        $data['image'] = $photoName;
        $location = new Location();
        $location->name = $request->name;
        $location->article = $request->article;
        $location->image = $data['image'];
        $location->description = $request->description;
        $location->save();
        $icon_names = $request->icon_name;
        $icon_images = $request->icon_image;
        $icon_titles = $request->icon_title;
        $location_images = $request->location_image;
        // $location_images = $request->location_image;
        foreach ($icon_names as $index => $icon_name) {
            $locationicon = new LocationsIcon();
            $locationicon->name = $icon_names[$index];
            $locationicon->title = $icon_titles[$index];
            $locationicon->image =  $this->uploadPhoto($icon_images[$index], 'locations/icons');
            $locationicon->locations_id = $location->id;
            $locationicon->save();
            $i = 0;
        }
        foreach ($location_images as $index => $location_image) {
            $locationimage = new LocationsImage();
            $locationimage->image =  $this->uploadPhoto($location_image, 'locations/img');

            $locationimage->locations_id = $location->id;
            dd($locationimage);
            $locationimage->save();
            $i++;
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Session::has('loginId')) {
            $location = Location::where('id', $id)->first();
            $icons = LocationsIcon::where('locations_id', $id)->get();
            $images = LocationsImage::where('locations_id', $id)->get();
            // dd($images);
            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.locations.view', compact('location', 'user', 'icons', 'images'));
        } else
            return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Session::has('loginId')) {
            $location = Location::where('id', $id)->first();
            $icons = LocationsIcon::where('locations_id', $id)->get();
            $images = LocationsImage::where('locations_id', $id)->get();
            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.locations.edit', compact('location', 'icons', 'user', 'images'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data = $request->except('icon_name', 'image', 'icon_image', 'token', 'location_images');
        $location =  Location::find($id);
        if ($request->hasFile('image')) {
            $photoDel = Location::select('image')->where('id', $id)->first();
            $del = public_path('assets/img/location' . $photoDel);
            $this->deletePhoto($del);
            $photoName = $this->uploadPhoto($request->image, 'location');
            $data['image'] = $photoName;
            $location->image = $data['image'];
        }
        $location->name = $request->name;

        $location->description = $request->description;
        $location->save();
        $icons = $location->locations_icons;
        $imagesL = $location->locations_images;


        $i = 0;
        foreach ($icons as $index => $icon) {
            if ($request->hasFile('icon_image')) {
                $images = Request()->file('icon_image');
                $photoDel = $icon->image;
                $del = public_path('assets/img/locations/icons' . $photoDel);
                $this->deletePhoto($del);
                $icon->image = $this->uploadPhoto($images[$index], 'locations/icons');
            }

            $icon->name = $request->icon_name[$i];
            $icon->title = $request->icon_title[$index];

            $icon->save();
            $i = $i++;
        }
        foreach ($imagesL as $index => $image) {
            if ($request->hasFile('location_image')) {
                $location_images = Request()->file('location_image');
                $photoDel = $image->image;
                $del = public_path('assets/img/locations/img' . $photoDel);
                $this->deletePhoto($del);

                $image->image = $this->uploadPhoto($location_images[$index], 'locations/img');
                $image->save();
            }
        }
        return redirect()->route('locations.index')->with('seccess', 'stored seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $location =  Location::find($id);
        $photoDel = Location::select('image')->where('id', $id)->first();
        $del = public_path('assets/img/locations' . $photoDel);
        $this->deletePhoto($del);
        $icons = $location->locations_icons;
        $images = $location->locations_images;
        foreach ($icons as  $icon) {
            $photoDel = $icon->image;
            $del = public_path('assets/img/locations/icons' . $photoDel);
            $this->deletePhoto($del);
            $icon->delete();
        }
        foreach ($images as  $image) {
            $photoDel = $image->image;
            $del = public_path('assets/img/locations/img' . $photoDel);
            $this->deletePhoto($del);
            $image->delete();
        }
        $location->delete();
        return redirect()->route('locations.index')->with('seccess', 'deleted seccessfully');
    }
}
