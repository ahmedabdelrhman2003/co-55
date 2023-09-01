<?php


namespace App\Http\Controllers\dashboard;

use Illuminate\Http\UploadedFile;

use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\traits\media;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Models\services\Service;
use App\Models\services\ServicesIcon;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (Session::has('loginId')) {
        $services = Service::all();


        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.services.index', compact('services', 'user'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (Session::has('loginId')) {


        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.services.create', compact('user'));
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required'],
            'description' => ['required',  'min:10'],
            'icon_title' => ['required'],
            'image' => ['image', 'required', 'mimes:jpeg,jpg,png,svg', 'max:1000'],
            'icon_name' => ['required'],
            'icon_image' => ['required', 'min:3', 'array'],
        ]);

        $data = $request->except('icon_name', 'image', 'icon_image', 'token');
        $photoName = $this->uploadPhoto($request->image, 'services');
        $data['image'] = $photoName;
        $service = new Service();
        $service->name = $request->name;
        $service->image = $data['image'];
        $service->description = $request->description;
        $service->save();
        $icon_names = $request->icon_name;
        $icon_images = $request->icon_image;
        $icon_title = $request->icon_title;
        foreach ($icon_names as $index => $icon_name) {
            $nameAttribute = new ServicesIcon();
            $nameAttribute->name = $icon_names[$index];
            $nameAttribute->title = $icon_title[$index];
            $nameAttribute->image =  $this->uploadPhoto($icon_images[$index], 'services/icons');
            $nameAttribute->services_id = $service->id;
            $nameAttribute->save();
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Session::has('loginId')) {
            $service = Service::where('id', $id)->first();
            // $service = Service::find($id)->with('services_icons')->get();
            // dd($service);
            $icons = ServicesIcon::where('services_id', $id)->get();
            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.services.view', compact('service', 'user', 'icons'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Session::has('loginId')) {
            $service = Service::where('id', $id)->first();
            // $service = Service::find($id)->with('services_icons')->get();
            // dd($service);
            $icons = ServicesIcon::where('services_id', $id)->get();
            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.services.edit', compact('service', 'icons', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // Request()->file('image')->store('public/assets/img');
        // $this->uploadPhoto($request->image, '');

        // dd($request->image);
        $request->validate([
            'name' => ['required'],
            'description' => ['required', 'min:10'],
            'icon_title' => ['required'],
            'image' => ['image', 'required', 'mimes:jpj,png,jpeg,svg', 'max:1000'],
            'icon_name' => ['required'],

        ]);
        $service =  Service::find($id);
        $data = $request->except('icon_name', 'image', 'icon_image', 'token');
        if ($request->hasFile('image')) {
            $photoDel = Service::select('image')->where('id', $id)->first();
            $del = public_path('assets/img/services' . $photoDel);
            $this->deletePhoto($del);
            $photoName = $this->uploadPhoto($request->image, 'services');
            $data['image'] = $photoName;
            $service->image = $data['image'];
        }


        $service->name = $request->name;

        $service->description = $request->description;
        $service->save();
        $icons = $service->services_icons;

        $icon_images = $request->icon_image;

        $i = 0;
        foreach ($icons as $index => $icon) {
            if ($request->hasFile('icon_image')) {

                $images = Request()->file('icon_image');
                $photoDel = $icon->image;
                $del = public_path('assets/img/services/icons' . $photoDel);
                $this->deletePhoto($del);
                $icon_images = $request->icon_image;
                $icon->image = $this->uploadPhoto($images[$index], 'icons');
            }

            $icon->name = $request->icon_name[$i];
            $icon->title = $request->icon_title[$index];
            $icon->save();
            $i = $i++;
        }
        return redirect()->route('services.index')->with('seccess', 'edited seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service =  Service::find($id);
        $photoDel = Service::select('image')->where('id', $id)->first();
        $del = public_path('assets/img/services' . $photoDel);
        $this->deletePhoto($del);
        $icons = $service->services_icons;
        foreach ($icons as  $icon) {
            $photoDel = $icon->image;
            $del = public_path('assets/img/services/icons' . $photoDel);
            $this->deletePhoto($del);
            $icon->delete();
        }
        $service->delete();
        return redirect()->route('services.index')->with('seccess', 'deelted seccessfully');
    }
}
