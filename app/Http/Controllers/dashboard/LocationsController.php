<?php

namespace App\Http\Controllers\dashboard;

use App\Models\locations\Location;
use App\Models\locations\LocationsIcon;
use App\Models\locations\LocationsImage;
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
        $locations = Location::paginate(10);

        return view('dashboard.locations.index', compact('locations',));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $locations = Location::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $data = $request->except('image', 'icon_image', 'token', 'location_image');
        $photoName = $this->uploadPhoto($request->image, 'location');
        $data['image'] = $photoName;
        $location = new Location();
        $location->name = $request->name;
        $location->longitude = $request->long;
        $location->latitude = $request->long;
        $location->article = $request->article;
        $location->image = $data['image'];
        $location->description = $request->description;
        $location->save();

        $icon_images = $request->icon_image;
        $icon_titles = $request->icon_title;
        $location_images = $request->location_image;
        foreach ($icon_titles as $index => $icon_title) {
            $locationicon = new LocationsIcon();
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
            $locationimage->save();
            $i++;
        }

        return redirect()->route('locations.index')->with('success', 'stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $location = Location::where('id', $id)->first();
        $icons = LocationsIcon::where('locations_id', $id)->get();
        $images = LocationsImage::where('locations_id', $id)->get();

        return view('dashboard.locations.view', compact('location', 'icons', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $location = Location::where('id', $id)->first();
        $icons = LocationsIcon::where('locations_id', $id)->get();
        $images = LocationsImage::where('locations_id', $id)->get();

        return view('dashboard.locations.edit', compact('location', 'icons', 'images'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data = $request->except('image', 'icon_image', 'token', 'location_images');
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
        $location->article = $request->article;
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
            $icon->title = $request->icon_title[$index];
            $icon->save();
            $i = $i++;
        }
        $location->locations_images = $icons;
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

        return redirect()->route('locations.index')->with('success', 'updated successfully');
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
        return redirect()->route('locations.index')->with('success', 'deleted successfully');
    }
}
