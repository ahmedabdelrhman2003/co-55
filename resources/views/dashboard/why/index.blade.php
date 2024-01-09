@extends('layout')
@section('title', 'why table | co-55 - Admin Dashboard ')
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

                                    <li class="breadcrumb-item active"> Why</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Why</h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1rem;">

                    <div class="col-5">
                        <form action="{{ route('why.filter') }}" method="get">
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
                                        <h4>WHY CO-55</h4>
                                    </div>

                                    @can('add-why')
                                        <div class="col-md-6">
                                            <div class="text-md-right">
                                                <a style="color: white" href="{{ route('why.create') }}"> <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i
                                                            class="mdi mdi-basket mr-1"></i> add card</button></a>

                                            </div>
                                        </div><!-- end col-->
                                    @endcan
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>

                                                <th>photo</th>
                                                <th>card title</th>
                                                <th>activation</th>

                                                <th style="width: 82px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($why as $section)
                                                <tr>

                                                    <td class="table-user">
                                                        <img src="{{ asset('assets/img/why/' . $section->image) }}"
                                                            alt="table-user" class="mr-2 rounded-circle">

                                                    </td>
                                                    <td>
                                                        {{ $section->name }}
                                                    </td>
                                                    <td>
                                                        @if ($section->activation == 0)
                                                            <a style="margin-left: 1.5rem"
                                                                href="{{ route('activation.table', ['id' => $section->id, 'table' => 'why']) }}"><i
                                                                    class=" mdi mdi-24px mdi-check-bold"></i></a>
                                                        @else
                                                            <a style="margin-left: 1.5rem"
                                                                href="{{ route('activation.table', ['id' => $section->id, 'table' => 'why']) }}"><i
                                                                    class=" mdi mdi-24px mdi-close-thick"></i></a>
                                                        @endif

                                                    </td>




                                                    <td>
                                                        @can('view-why')
                                                            <a href="{{ route('why.view', $section->id) }}"><i
                                                                    class=" mdi mdi-24px mdi-eye" class="icon-dual"></i></a>
                                                        @endcan
                                                        @can('edit-why')
                                                            <a href="{{ route('why.edit', $section->id) }}"
                                                                class="action-icon">
                                                                <i class="mdi mdi-24px mdi-square-edit-outline"></i>
                                                            </a>
                                                        @endcan
                                                        @can('destroy-why')
                                                            <a href="{{ route('why.destroy', $section->id) }}"
                                                                onclick="return confirm('Are you sure you want to delete this?')"
                                                                class="action-icon">
                                                                <i class="mdi mdi-24px mdi-delete"></i></a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                    <div class="div">{{ $why->links('pagination::bootstrap-5') }}</div>

                                </div>


                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->

                </div>
            </div>
        </div>
    </div>
@endsection
