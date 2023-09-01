<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $abouts = DB::table('abouts')->select()->get();


        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.abouts.index', compact('abouts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.abouts.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);
        $abouts = DB::table('abouts')->insert([
            'title' => $request->title,
            'description' => $request->description
        ]);
        return redirect()->route('abouts.index')->with('seccess', 'stored seccessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $abouts = DB::table('abouts')->select()->where('id', $id)->first();
        $user = User::where('id', Session::get('loginId'))->first();

        return view('dashboard.abouts.view', compact('abouts', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $abouts = DB::table('abouts')->select()->where('id', $id)->first();
        $user = User::where('id', Session::get('loginId'))->first();

        return view('dashboard.abouts.edit', compact('abouts', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required', 'min:5'],

        ]);
        DB::table('abouts')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,

        ]);
        return redirect()->route('abouts.index')->with('seccess', 'updated seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('abouts')->where('id', $id)->delete();
        return redirect()->route('abouts.index')->with('seccess', 'deleted seccessfully');
    }
}
