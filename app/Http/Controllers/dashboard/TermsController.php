<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.terms.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function page()
    {
        $terms = DB::table('terms')->select()->get();

        return view('pages.terms', compact('terms'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $terms = DB::table('terms')->select()->where('id', $id)->first();

        return view('dashboard.terms.view', compact('terms', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $terms = DB::table('terms')->select()->where('id', $id)->first();
        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.terms.edit', compact('terms', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'article' => ['required', 'min:1', 'max:225']
        ]);
        DB::table('terms')->where('id', $id)->update([
            'article' => $request->article,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        return redirect()->route('terms.index')->with('success', 'updated successfully');
    }
}
