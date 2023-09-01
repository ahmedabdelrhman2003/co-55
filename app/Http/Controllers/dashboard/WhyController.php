<?php

namespace App\Http\Controllers\dashboard;

use App\Http\traits\media;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Session;

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
        $why = DB::table('why')->select()->get();


        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.why.index', compact('why', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('id', Session::get('loginId'))->first();
        return view('dashboard.why.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required', 'min:5'],
            'image' => ['required']

        ]);
        $photoName = $this->uploadPhoto($request->image, 'why');

        DB::table('why')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $photoName,


        ]);
        return redirect()->route('why.index')->with('seccess', 'stored seccessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $why = DB::table('why')->select()->where('id', $id)->first();
        $user = User::where('id', Session::get('loginId'))->first();

        return view('dashboard.why.view', compact('why', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $why = DB::table('why')->select()->where('id', $id)->first();
        $user = User::where('id', Session::get('loginId'))->first();

        return view('dashboard.why.edit', compact('why', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
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
        return redirect()->route('why.index')->with('seccess', 'deleted seccessfully');
    }
}
