<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
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
        $faqs = DB::table('faqs')->select()->paginate(10);

        return view('dashboard.faqs.index', compact('faqs'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $faqs = DB::table('faqs')->select()->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.faqs.index', compact('faqs'));
    }
    function get()
    {
        $faqs_member = Db::table('faqs')->select()->where('type', '=', 'membership')->get();
        $faqs_general = Db::table('faqs')->select()->where('type', '=', 'general')->get();

        return view('pages.faq', compact('faqs_member', 'faqs_general'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required', 'min:10', 'max:225'],
            'answer' => ['required', 'min:5', 'max:225'],
            'type' => ['required', 'in:general,membership']
        ]);
        DB::table('faqs')->insert([
            'question' => $request->question,
            'answer' => $request->answer,
            'type' => $request->type,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return redirect()->route('faqs.index')->with('success', 'stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $faqs = DB::table('faqs')->select()->where('id', $id)->first();

        return view('dashboard.faqs.view', compact('faqs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faqs = DB::table('faqs')->select()->where('id', $id)->first();

        return view('dashboard.faqs.edit', compact('faqs'));
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

        return redirect()->route('faqs.index')->with('success', 'edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('faqs')->where('id', $id)->delete();

        return redirect()->route('faqs.index')->with('success', 'deleted successfully');
    }
}
