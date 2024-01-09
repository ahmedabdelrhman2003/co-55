<?php

namespace App\Http\Controllers\dashboard;

use App\Mail\ContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = DB::table('contact')->paginate(10);

        return view('dashboard.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function reply($id)
    {
        $contact = DB::table('contact')->where('id', $id)->first();
        return view('dashboard.contact.reply', compact('contact'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $contact = DB::table('contact')->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);
        return view('dashboard.contact.index', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function send(Request $request, $id)
    {
        $request->validate([
            'reply' => ['required', 'max:255']
        ]);
        DB::table('contact')->where('id', $id)->update([
            'reply' => $request->reply,
        ]);
        $contact = DB::table('contact')->select('reply', 'email')->where('id', $id)->first();
        Mail::to($contact->email)->send(new ContactMail($contact));
        DB::table('contact')->where('id', $id)->update([
            'status' => 'replied',
        ]);

        return redirect()->route('contact.index')->with('success', 'sent successfully');
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'number' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:255'],
            'company' => ['required', 'max:255'],
        ]);
        $quiry =  DB::table('contact')->insert([
            'name' => $request->name,
            'phone' => $request->number,
            'email' => $request->email,
            'message' => $request->message,
            'company' => $request->company,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return redirect()->back();
    }
}
