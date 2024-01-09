@extends('layout')
@section('title', 'Testimonial table | co-55 - Admin Dashboard ')
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

                                    <li class="breadcrumb-item active"> Testimonials</li>
                                </ol>
                            </div>
                            <h4 class="page-title">View Abouts</h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1rem;">

                    <div class="col-5">
                        <form action="{{ route('testimonials.filter') }}" method="get">
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
                                        <h4>testimonials</h4>
                                    </div>
                                    @can('add-testimonials')
                                        <div class="col-md-6">
                                            <div class="text-md-right">
                                                <a href="{{ route('testimonials.create') }}"> <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i
                                                            class="mdi mdi-basket mr-1"></i> add testimonials</button></a>

                                            </div>
                                        </div><!-- end col-->
                                    @endcan
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>

                                                <th>icon</th>
                                                <th>Name</th>
                                                <th>Title</th>
                                                <th>activation</th>

                                                <th style="width: 82px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($testimonials as $testimonial)
                                                <tr>

                                                    <td class="table-user">
                                                        <img src="{{ asset('assets/img/testimonials/' . $testimonial->image) }}"
                                                            alt="table-user" class="mr-2 rounded-circle">

                                                    </td>
                                                    <td>
                                                        {{ $testimonial->name }}
                                                    </td>
                                                    <td>
                                                        {{ $testimonial->title }}
                                                    </td>
                                                    <td>

                                                        @if ($testimonial->activation == 0)
                                                            <a style="margin-left: 1.5rem"
                                                                href="{{ route('activation.table', ['id' => $testimonial->id, 'table' => 'testimonials']) }}"><i
                                                                    class=" mdi mdi-24px mdi-check-bold"></i></a>
                                                        @else
                                                            <a style="margin-left: 1.5rem"
                                                                href="{{ route('activation.table', ['id' => $testimonial->id, 'table' => 'testimonials']) }}"><i
                                                                    class=" mdi mdi-24px mdi-close-thick"></i></a>
                                                        @endif


                                                    </td>




                                                    <td>
                                                        @can('view-testimonials')
                                                            <a href="{{ route('testimonials.view', $testimonial->id) }}"><i
                                                                    class=" mdi mdi-24px mdi-eye" class="icon-dual"></i></a>
                                                        @endcan
                                                        @can('edit-testimonials')
                                                            <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                                                class="action-icon">
                                                                <i class="mdi mdi-24px mdi-square-edit-outline"></i>
                                                            </a>
                                                        @endcan
                                                        @can('destroy-testimonials')
                                                            <a href="{{ route('testimonials.destroy', $testimonial->id) }}"
                                                                class="action-icon"
                                                                onclick="return confirm('Are you sure you want to delete this?')">
                                                                <i class="mdi mdi-24px mdi-delete"></i></a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="div">{{ $testimonials->links('pagination::bootstrap-5') }}</div>
                                </div>


                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->

                </div>
            </div>
        </div>
    </div>
@endsection
