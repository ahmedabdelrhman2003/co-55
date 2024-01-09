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

        return view('dashboard.privacy.index', compact('privacy'));
    }

    public function show($id)
    {
        $privacy = DB::table('privacy')->select()->where('id', $id)->first();

        return view('dashboard.privacy.view', compact('privacy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $privacy = DB::table('privacy')->select()->where('id', $id)->first();

        return view('dashboard.privacy.edit', compact('privacy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'article' => ['required', 'min:1', 'max:225']
        ]);
        DB::table('privacy')->where('id', $id)->update([
            'article' => $request->article,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return redirect()->route('privavy.index')->with('success', 'updated successfully');
    }
}
