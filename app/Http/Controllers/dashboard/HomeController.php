<?php

namespace App\Http\Controllers\dashboard;

use App\Http\traits\media;
use Illuminate\Support\Facades\DB;
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
        $homes = DB::table('home')->select()->paginate(10);

        return view('dashboard.home.index', compact('homes'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $homes = DB::table('home')->select()->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.home.index', compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:225'],
            'image' => ['required', 'mimes:png,jpg,jpeg']
        ]);
        $photoName = $this->uploadPhoto($request->image, 'home');
        DB::table('home')->insert([
            'title' => $request->title,
            'image' => $photoName,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return view('dashboard.home.index', compact('homes'))->with('success', 'edited successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $home = DB::table('home')->select()->where('id', $id)->first();

        return view('dashboard.home.view', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $home = DB::table('home')->select()->where('id', $id)->first();

        return view('dashboard.home.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'title' => ['required'],
        ]);
        if ($request->hasFile('image')) {
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

        return redirect()->route('home.index')->with('success', 'edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('home')->where('id', $id)->delete();

        return redirect()->route('hone.index')->with('success', 'deleted successfully');
    }
}
