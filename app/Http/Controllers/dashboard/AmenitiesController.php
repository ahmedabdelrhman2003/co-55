<?php

namespace App\Http\Controllers\dashboard;

use App\Http\traits\media;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Session;
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

        $amenities = DB::table('amenities')->select()->get();
        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.amenities.index', compact('user', 'amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.amenities.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],

            'image' => ['required']

        ]);
        $photoName = $this->uploadPhoto($request->image, 'amenities');

        DB::table('amenities')->insert([
            'name' => $request->name,

            'image' => $photoName,


        ]);
        return redirect()->route('amenities.index')->with('seccess', 'stored seccessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Session::has('loginId')) {
            $amenities = DB::table('amenities')->select()->where('id', $id)->first();
            $user = User::where('id', Session::get('loginId'))->first();

            return view('dashboard.amenities.view', compact('amenities', 'user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Session::has('loginId')) {
            $amenities = DB::table('amenities')->select()->where('id', $id)->first();
            $user = User::where('id', Session::get('loginId'))->first();

            return view('dashboard.amenities.edit', compact('amenities', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => ['required'],
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
        return redirect()->route('amenities.index')->with('seccess', 'edited seccessfully');
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
