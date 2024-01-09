<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = DB::table('abouts')->select()->paginate(10);
        return view('dashboard.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.abouts.create');
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],

        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $abouts = DB::table('abouts')->select()->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.abouts.index', compact('abouts'));
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $abouts = DB::table('abouts')->select()->where('id', $id)->first();


        return view('dashboard.abouts.view', compact('abouts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $abouts = DB::table('abouts')->select()->where('id', $id)->first();


        return view('dashboard.abouts.edit', compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([

            'description' => ['required', 'min:5', 'max:255'],

        ]);
        DB::table('abouts')->where('id', $id)->update([

            'description' => $request->description,

        ]);
        return redirect()->route('abouts.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
}
