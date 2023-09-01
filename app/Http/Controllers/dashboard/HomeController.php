<?php

namespace App\Http\Controllers\dashboard;

use App\Http\traits\media;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Session::has('loginId')) {


            $home = DB::table('home')->select()->get();

            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.home.index', compact('home', 'user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Session::has('loginId')) {


            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.home.create', compact('user'));
        } else {
            return redirect()->route('auth.login-user');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],

            'image' => ['required']

        ]);

        $photoName = $this->uploadPhoto($request->image, 'home');

        DB::table('home')->insert([
            'title' => $request->title,

            'image' => $photoName,


        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Session::has('loginId')) {
            $home = DB::table('home')->select()->where('id', $id)->first();
            $user = User::where('id', Session::get('loginId'))->first();

            return view('dashboard.home.view', compact('home', 'user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Session::has('loginId')) {
            $home = DB::table('home')->select()->where('id', $id)->first();
            $user = User::where('id', Session::get('loginId'))->first();

            return view('dashboard.home.edit', compact('home', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'title' => ['required'],
        ]);
        if ($request->hasFile('icon_image')) {
            $photoDel = DB::table('home')->select('image')->where('id', $id)->get();
            $del = public_path('assets/img/home/' . $photoDel);
            $this->deletePhoto($del);
            $photoName = $this->uploadPhoto($request->image, 'home');
            $affected = DB::table('home')->where('id', $id)->update([
                'title' => $request->title,
                'image' => $photoName
            ]);
        } else {
            DB::table('home')->where('id', $id)->update([
                'title' => $request->title,
            ]);
        }
        return redirect()->route('home.index')->with('seccess', 'edited seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        DB::table('home')->where('id', $id)->delete();
        return redirect()->route('hone.index')->with('seccess', 'deleted seccessfully');
    }
}
