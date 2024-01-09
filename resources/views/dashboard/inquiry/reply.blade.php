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
                                    <li class="breadcrumb-item"><a href="{{ route('inquiry.index') }}">Inquiry</a></li>
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
                                                <th>company</th>
                                                <th>message</th>
                                                <th>status</th>
                                                <th>services</th>
                                                <th>location</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    {{ $inquiry->name }}
                                                </td>
                                                <td>
                                                    {{ $inquiry->email }}
                                                </td>
                                                <td>
                                                    {{ $inquiry->phone }}
                                                </td>
                                                <td>
                                                    {{ $inquiry->company }}
                                                </td>
                                                <td> {{ $inquiry->message }}</td>

                                                <td> {{ $inquiry->satus }}</td>
                                                <td> {{ $inquiry->services }}</td>
                                                <td> {{ $inquiry->location }}</td>
                                            </tr>


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
                                <form action="{{ route('inquiry.send', $inquiry->id) }}" method="post">
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
