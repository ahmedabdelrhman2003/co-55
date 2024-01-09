@extends('layout')
@section('title', 'Jobs table | co-55 - Admin Dashboard ')
@section('content')
    <!-- Start Content-->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active"> Jobs</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Job</h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1rem;">

                    <div class="col-5">
                        <form action="{{ route('jobs.filter') }}" method="get">
                            @csrf
                            <label for="example-date">Date From</label>
                            <input class="form-control" id="example-date" type="date" name="start_date">
                            @error('start_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-10"> <label for="example-date">Date To</label>
                                <input class="form-control" id="example-date" type="date" name="end_date">
                                @error('end_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button
                                style="height: 2rem;
                            padding-bottom: 1.5rem;
                            margin-top: 1.9rem;"
                                type="submit" class="btn btn-blue waves-effect waves-light">filter</button>
                            </form>
                        </div>

                    </div>



                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h4>job titles</h4>
                                    </div>
                                    @can('add-title')
                                        <div class="col-md-6">
                                            <div class="text-md-right">
                                                <a href="{{ route('title.create') }}"><button type="button"
                                                        class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i
                                                            class="mdi mdi-basket mr-1"></i> add job title</button></a>
                                            </div>
                                        </div><!-- end col-->
                                    @endcan
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>

                                                <th>title</th>
                                                <th style="width: 82px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($titles as $title)
                                                <tr>
                                                    <td>
                                                        {{ $title->title }}
                                                    </td>
                                                    <td>
                                                        @can('destroy-title')
                                                            <a href="{{ route('title.destroy', $title->id) }}"
                                                                class="action-icon"
                                                                onclick="return confirm('Are you sure you want to delete this?')">
                                                                <i class="mdi mdi-24px mdi-delete"></i>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="div">{{ $titles->links('pagination::bootstrap-5') }}</div>
                                </div>
                            </div>
                            <!-- end card-body-->
                        </div> <!-- end card-->

                    </div> <!-- end col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h4>job</h4>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>

                                                <th>name</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <th>title</th>

                                                <th style="width: 82px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jobs as $job)
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

                                                    <td>
                                                        @can('view-jobs')
                                                            <a href="{{ route('jobs.reply', $job->id) }}"> <button
                                                                    type="button"
                                                                    class="btn btn-success width-sm waves-effect waves-light">reply
                                                                    with
                                                                    email</button></a>
                                                        @endcan
                                                        @can('destroy-job')
                                                            <a href="{{ route('job.destroy', $job->id) }}"></a>
                                                            <button class="btn btn-danger waves-effect waves-light"><i
                                                                    class="mdi mdi-24px mdi-close"></i></button>
                                                        @endcan

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="div">{{ $jobs->links('pagination::bootstrap-5') }}</div>

                                </div>

                            </div>
                            <!-- end card-body-->
                        </div> <!-- end card-->

                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>
@endsection
