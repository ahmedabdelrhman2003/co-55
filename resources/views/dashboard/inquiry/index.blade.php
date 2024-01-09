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
                                    <li class="breadcrumb-item active"> inquiry</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Inquiries</h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1rem;">

                    <div class="col-5">
                        <form action="{{ route('inquiry.filter') }}" method="get">
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
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h4>inquiry</h4>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>

                                                <th>name</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <th>company</th>
                                                <th>message</th>
                                                <th>status</th>
                                                <th>services</th>
                                                <th>location</th>


                                                <th style="width: 82px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inquiry as $section)
                                                <tr>
                                                    <td>
                                                        {{ $section->name }}
                                                    </td>
                                                    <td>
                                                        {{ $section->email }}
                                                    </td>
                                                    <td>
                                                        {{ $section->phone }}
                                                    </td>
                                                    <td>
                                                        {{ $section->company }}
                                                    </td>
                                                    <td> {{ $section->message }}</td>

                                                    <td> {{ $section->satus }}</td>
                                                    <td> {{ $section->services }}</td>
                                                    <td> {{ $section->location }}</td>


                                                    <td>
                                                        @can('view-inquiry')
                                                            <a href="{{ route('inquiry.reply', $section->id) }}"> <button
                                                                    type="button"
                                                                    class="btn btn-success width-sm waves-effect waves-light">reply
                                                                    with
                                                                    email</button></a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="div">{{ $inquiry->links('pagination::bootstrap-5') }}</div>

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
