@extends('layout')
@section('title', 'abouts table | co-55 - Admin Dashboard ')
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
                                    <li class="breadcrumb-item active">Abouts</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Abouts</h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1rem;">
                    <div class="col-5">
                        <form action="{{ route('abouts.filter') }}" method="get">
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
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h4>about us</h4>
                                    </div>
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
                                            @foreach ($abouts as $about)
                                                <tr>
                                                    <td>
                                                        {{ $about->title }}
                                                    </td>

                                                    <td>
                                                        @can('view-abouts')
                                                            <a href="{{ route('abouts.view', $about->id) }}"><i
                                                                    class="mdi-24px mdi mdi-eye-outline
                                                                    "
                                                                    class="icon-dual"></i></a>
                                                        @endcan
                                                        @can('edit-abouts')
                                                            <a href="{{ route('abouts.edit', $about->id) }}"
                                                                class="action-icon">
                                                                <i class="mdi-24px mdi mdi-square-edit-outline"></i>
                                                            </a>
                                                        @endcan

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="div">{{ $abouts->links('pagination::bootstrap-5') }}</div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>
@endsection
