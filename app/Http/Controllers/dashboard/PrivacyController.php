<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $privacy = DB::table('privacy')->select()->get();
        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.privacy.index', compact('privacy', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $privacy = DB::table('privacy')->select()->where('id', $id)->first();
        $user = User::where('id', Session::get('loginId'))->first();

        return view('dashboard.privacy.view', compact('privacy', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $privacy = DB::table('privacy')->select()->where('id', $id)->first();
        $user = User::where('id', Session::get('loginId'))->first();

        return view('dashboard.privacy.edit', compact('privacy', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'article' => ['required', 'min:100']
        ]);
        DB::table('privacy')->where('id', $id)->update([
            'article' => $request->article,

        ]);
        return redirect()->route('privavy.index')->with('seccess', 'updated seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
