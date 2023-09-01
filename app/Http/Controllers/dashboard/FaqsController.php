<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Session::has('loginId')) {
            $faqs = DB::table('faqs')->select()->get();
            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.faqs.index', compact('user', 'faqs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



            $user = User::where('id', Session::get('loginId'))->first();
            return view('dashboard.faqs.create', compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required', 'min:10'],
            'answer' => ['required', 'min:5'],
            'type' => ['required']

        ]);
        DB::table('faqs')->insert([
            'question' => $request->question,
            'answer' => $request->answer,
            'type' => $request->type,


        ]);
        return redirect()->route('faqs.index')->with('seccess', 'stored seccessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

            $faqs = DB::table('faqs')->select()->where('id', $id)->first();
            $user = User::where('id', Session::get('loginId'))->first();

            return view('dashboard.faqs.view', compact('faqs', 'user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Session::has('loginId')) {
            $faqs = DB::table('faqs')->select()->where('id', $id)->first();
            $user = User::where('id', Session::get('loginId'))->first();

            return view('dashboard.faqs.edit', compact('faqs', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $request->validate([
            'question' => ['required', 'min:10'],
            'answer' => ['required', 'min:5'],
            'type' => ['required', 'in:general,membership']
        ]);
        $affected = DB::table('faqs')->where('id', $id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'type' => $request->type
        ]);
        return redirect()->route('faqs.index')->with('seccess', 'edited seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('faqs')->where('id', $id)->delete();
        return redirect()->route('faqs.index')->with('seccess', 'deleted seccessfully');
    }
}
