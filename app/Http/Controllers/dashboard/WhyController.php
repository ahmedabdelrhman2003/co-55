<?php

namespace App\Http\Controllers\dashboard;

use App\Http\traits\media;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhyController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $why = DB::table('why')->select()->paginate(10);

        return view('dashboard.why.index', compact('why'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $why = DB::table('why')->select()->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.why.index', compact('why'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.why.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:225'],
            'description' => ['required', 'min:5'],
            'image' => ['required', 'mimes:png,jpg,jpeg']
        ]);
        $photoName = $this->uploadPhoto($request->image, 'why');
        DB::table('why')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $photoName,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return redirect()->route('why.index')->with('success', 'stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $why = DB::table('why')->select()->where('id', $id)->first();

        return view('dashboard.why.view', compact('why'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $why = DB::table('why')->select()->where('id', $id)->first();

        return view('dashboard.why.edit', compact('why'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:225'],
            'description' => ['required', 'min:5'],
        ]);
        if ($request->hasFile('image')) {
            $photoDel = DB::table('why')->select('image')->where('id', $id)->get();
            $del = public_path('assets/img/why/' . $photoDel);
            $this->deletePhoto($del);
            $photoName = $this->uploadPhoto($request->image, 'why');
            $affected = DB::table('why')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $photoName
            ]);
        } else {
            DB::table('why')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('why.index')->with('seccess', 'edited seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('why')->where('id', $id)->delete();

        return redirect()->route('why.index')->with('success', 'deleted successfully');
    }
}