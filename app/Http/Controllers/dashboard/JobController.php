<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
use App\Http\traits\media;
use App\Mail\JobMail;
use App\Http\Controllers\Controller;
use App\Models\job\Job;
use App\Models\job\JobsFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('job_titles')->paginate(10);
        $titles = DB::table('job_titles')->select()->paginate(10);

        return view('dashboard.jobs.index', compact('jobs', 'titles',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function reply($id)
    {
        $job = Job::where('id', $id)->with('job_titles')->first();
        $files = JobsFile::where('job_id', $id)->get();

        return view('dashboard.jobs.reply', compact('job', 'files'));
    }
    function filter(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $jobs = Job::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(10);

        return view('dashboard.jobs.index', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    function create()
    {
        return view('dashboard.jobs.create');
    }
    function store_title(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255']
        ]);
        DB::table('job_titles')->insert([
            'title' => $request->title,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        return redirect()->route('jobs.index');
    }

    public function send(Request $request, $id)
    {
        $request->validate([
            'reply' => ['required', 'max:225']
        ]);
        $job = Job::where('id', $id)->first();
        $job->reply = $request->reply;
        $job->save();
        Mail::to($job->email)->send(new JobMail($job));

        return redirect()->route('jobs.index')->with('success', 'sent successfully');
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:job_titles,id'],
            'name' => ['required', 'max:255'],
            'number' => ['required', 'numeric',],
            'email' => ['required', 'email',],
            'filee' => ['required', 'min:0', 'array'],
            'filee.*' => ['mimes:pdf']
        ]);
        $files = $request->file('filee');
        $job = new Job();
        $job->name = $request->name;
        $job->phone = $request->number;
        $job->email = $request->email;
        $job->title_id = $request->id;
        $job->save();
        foreach ($files as $index => $file) {
            $files = new JobsFile();
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadedFile = $file->move(public_path('assets/job'), $fileName);
            $files->file = $fileName;
            $files->job_id = $job->id;
            $files->save();
        }

        return redirect()->back()->with('success', 'stored successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function download($id)
    {
        $file = JobsFile::where('id', $id)->first();
        $filePath = public_path('assets/job/' . $file->file);

        return response()->download($filePath, $file->file);
    }
    function destroy($id)
    {
        $parentModel = Job::find($id);
        $parentModel->jobs_files()->delete();
        $parentModel->delete();

        return redirect()->route('hone.index');
    }
    function destroy_title($id)
    {
        DB::table('jobs')->where('id', $id)->delete();

        return redirect()->route('hone.index');
    }
}
