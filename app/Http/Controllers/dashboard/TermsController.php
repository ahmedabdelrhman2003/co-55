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

        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.terms.index', compact('user'));
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

        $terms = DB::table('terms')->select()->where('id', $id)->first();
        $user = User::where('id', Session::get('loginId'))->first();

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
            'article' => ['required', 'min:100']
        ]);
        DB::table('terms')->where('id', $id)->update([
            'article' => $request->article,

        ]);
        return redirect()->route('terms.index')->with('seccess', 'updated seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
