<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\traits\media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TestimonialsController extends Controller
{

    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = DB::table('testimonials')->select()->paginate(10);

        return view('dashboard.testimonials.index', compact('testimonials'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $testimonials = DB::table('testimonials')->select()->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:225'],
            'article' => ['required', 'max:1000'],
            'title' => ['required', 'max:255'],
            'image' => ['required', 'mimes:png,jpg,jpeg,svg']
        ]);
        $photoName = $this->uploadPhoto($request->image, 'testimonials');
        DB::table('testimonials')->insert([
            'name' => $request->name,
            'title' => $request->title,
            'article' => $request->article,
            'image' => $photoName,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        return redirect()->route('testimonials.index')->with('success', 'stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $testimonials = DB::table('testimonials')->select()->where('id', $id)->first();

        return view('dashboard.testimonials.view', compact('testimonials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonials = DB::table('testimonials')->select()->where('id', $id)->first();

        return view('dashboard.testimonials.edit', compact('testimonials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => ['required', 'max:225'],
            'article' => ['required', 'max:1000'],
            'title' => ['required', 'max:255'],
        ]);
        if ($request->hasFile('image')) {
            $photoDel = DB::table('testimonials')->select('image')->where('id', $id)->get();
            $del = public_path('assets/img/testimonials/' . $photoDel);
            $this->deletePhoto($del);
            $photoName = $this->uploadPhoto($request->image, 'testimonials');
        }
        $affected = DB::table('testimonials')->where('id', $id)->update([
            'name' => $request->name,
            'article' => $request->article,
            'title' => $request->title,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('testimonials')->where('id', $id)->delete();

        return redirect()->route('testimonials.index')->with('success', 'destroyed successfully');
    }
}
