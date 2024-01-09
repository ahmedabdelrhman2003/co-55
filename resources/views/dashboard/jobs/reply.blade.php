@extends('layout')
@section('title', ' view faqs | co-55 - Admin Dashboard ')
@section('content')
    <div class="content-page">

        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Jobs</a></li>
                                    <li class="breadcrumb-item active"> Reply</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Reply With Mail</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>

                                                <th>name</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <th>title</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    {{ $job->name }}
                                                </td>
                                                <td>
                                                    {{ $job->email }}
                                                </td>
                                                <td>
                                                    {{ $job->phone }}
                                                </td>
                                                <td>
                                                    {{ $job->job_titles->title }}
                                                </td>


                                            </tr>


                                        </tbody>
                                    </table>


                                </div>
                                <div class="col-md-6">
                                    <h5>files</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>id</th>
                                                <th>file</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($files as $file)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><a href="{{ route('jobs.download', $file->id) }}">{{ $file->file }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box" style="padding-bottom: 2rem">
                            <div class="card-body">
                                <h4>Reply With Mail:</h4>
                                <form action="{{ route('jobs.send', $job->id) }}" method="post">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea style="height: 9rem" name="reply" class="form-control" placeholder="write the mail here"
                                            id="floatingTextarea2"></textarea>

                                        <button style="float: right;margin-top:1rem"
                                            class="btn btn-primary waves-effect waves-light">
                                            <span>Send</span> <i class="mdi mdi-send ml-2"></i>
                                        </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
