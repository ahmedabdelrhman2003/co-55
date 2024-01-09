<?php


namespace App\Http\Controllers\dashboard;

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
        $services = Service::paginate(10);

        return view('dashboard.services.index', compact('services'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $services = service::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('id', Session::get('loginId'))->first();

        return view('dashboard.services.create', compact('user'));
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:225'],
            'description' => ['required',  'min:10', 'max:225'],
            'icon_title' => ['required', 'array', 'min:0'],
            'icon_title.*' => ['max:255'],
            'image' => ['image', 'required', 'mimes:jpeg,jpg,png,svg'],
            'icon_image.*' => ['mimes:jpeg,jpg,png,svg'],
            'icon_image' => ['array', 'required', 'min:0'],
            // 'icon_image.*' => ['mimes:jpeg,jpg,png,svg'],
        ]);
        $data = $request->except('icon_name', 'image', 'icon_image', 'token');
        $photoName = $this->uploadPhoto($request->image, 'services');
        $data['image'] = $photoName;
        $service = new Service();
        $service->name = $request->name;
        $service->image = $data['image'];
        $service->description = $request->description;
        $service->save();
        $icon_images = $request->icon_image;
        $icon_title = $request->icon_title;
        foreach ($icon_images as $index => $icon_name) {
            $nameAttribute = new ServicesIcon();
            $nameAttribute->title = $icon_title[$index];
            $nameAttribute->image =  $this->uploadPhoto($icon_images[$index], 'services/icons');
            $nameAttribute->services_id = $service->id;
            $nameAttribute->save();
        }

        return redirect()->route('services.index')->with('success', 'stored successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $service = Service::where('id', $id)->first();
        $icons = ServicesIcon::where('services_id', $id)->get();

        return view('dashboard.services.view', compact('service', 'icons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::where('id', $id)->first();
        $icons = ServicesIcon::where('services_id', $id)->get();

        return view('dashboard.services.edit', compact('service', 'icons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required', 'min:10'],
            'icon_title' => ['required', 'array'],

            'image' => ['image', 'mimes:jpj,png,jpeg,svg', 'max:1000'],
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

        foreach ($icons as $index => $icon) {
            if ($request->hasFile('icon_image')) {
                $images = Request()->file('icon_image');
                $photoDel = $icon->image;
                $del = public_path('assets/img/services/icons' . $photoDel);
                $this->deletePhoto($del);
                $icon_images = $request->icon_image;
                $icon->image = $this->uploadPhoto($images[$index], 'icons');
            }
            $icon->title = $request->icon_title[$index];
            $icon->save();
        }

        if ($request->has('icon_title2', 'icon_image2')) {
            $icon_images2 = $request->icon_image2;
            $icon_title2 = $request->icon_title2;
            foreach ($icon_images2 as $index => $icon_name) {
                $nameAttribute = new ServicesIcon();
                $nameAttribute->title = $icon_title2[$index];
                $nameAttribute->image =  $this->uploadPhoto($icon_images2[$index], 'services/icons');
                $nameAttribute->services_id = $service->id;
                $nameAttribute->save();
            }
        }

        return redirect()->route('services.index')->with('success', 'edited successfully');
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

        return redirect()->route('services.index')->with('success', 'deleted successfully');
    }
}
