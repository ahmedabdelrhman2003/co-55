<?php

namespace App\Http\Controllers\dashboard;

use App\Http\traits\media;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = DB::table('amenities')->select()->paginate(10);

        return view('dashboard.amenities.index', compact('amenities'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $amenities = DB::table('amenities')->select()->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:225'],
            'image' => ['required', 'mimes:png,jpg,jpeg,svg']
        ]);
        $photoName = $this->uploadPhoto($request->image, 'amenities');
        DB::table('amenities')->insert([
            'name' => $request->name,
            'image' => $photoName,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return redirect()->route('amenities.index')->with('success', 'stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $amenities = DB::table('amenities')->select()->where('id', $id)->first();

        return view('dashboard.amenities.view', compact('amenities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $amenities = DB::table('amenities')->select()->where('id', $id)->first();

        return view('dashboard.amenities.edit', compact('amenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => ['required', 'max:225'],
        ]);
        if ($request->hasFile('image')) {
            $photoDel = DB::table('amenities')->select('image')->where('id', $id)->get();
            $del = public_path('assets/img/amenities/' . $photoDel);
            $this->deletePhoto($del);
            $photoName = $this->uploadPhoto($request->image, 'amenities');
        }
        $affected = DB::table('amenities')->where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('amenities.index')->with('success', 'stored successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('amenities')->where('id', $id)->delete();

        return redirect()->route('dashboard');
    }
}