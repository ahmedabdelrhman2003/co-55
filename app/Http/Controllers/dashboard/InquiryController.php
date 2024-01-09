<?php

namespace App\Http\Controllers\dashboard;

use App\Mail\InquiryMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiry = DB::table('inquiry')->paginate(10);

        return view('dashboard.inquiry.index', compact('inquiry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function reply($id)
    {
        $inquiry = DB::table('inquiry')->where('id', $id)->first();

        return view('dashboard.inquiry.reply', compact('inquiry'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $inquiry = DB::table('inquiry')->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.inquiry.index', compact('inquiry'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function send(Request $request, $id)
    {
        $request->validate([
            'reply' => ['required', 'max:255']
        ]);
        DB::table('inquiry')->where('id', $id)->update([
            'reply' => $request->reply,
        ]);
        $inquiry = DB::table('inquiry')->select('reply', 'email')->where('id', $id)->first();
        Mail::to($inquiry->email)->send(new InquiryMail($inquiry));
        DB::table('inquiry')->where('id', $id)->update([
            'status' => 'replied',
        ]);

        return redirect()->route('inquiry.index');
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'service' => ['required', 'exists:services,name'],
            'location' => ['required', 'exists:locations,name'],
            'number' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:255'],
            'company' => ['required', 'max:255'],
        ]);
        $quiry =  DB::table('inquiry')->insert([
            'name' => $request->name,
            'services' => $request->service,
            'location' => $request->location,
            'phone' => $request->number,
            'email' => $request->email,
            'message' => $request->message,
            'company' => $request->company,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return redirect()->back()->with('success', 'the inquiry has been submited successfully');
    }
}
