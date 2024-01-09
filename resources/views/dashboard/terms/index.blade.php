@extends('layout')
@section('title', 'terms table | co-55 - Admin Dashboard ')
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

                                    <li class="breadcrumb-item active"> Terms</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Terms</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <h4>terms & conditions</h4>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>


                                                <th>title</th>


                                                <th style="width: 82px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>terms and conditions</td>
                                                <td>
                                                    @can('view-terms')
                                                        <a href="{{ route('terms.view', 1) }}"><i class=" mdi mdi-eye"
                                                                class="icon-dual"></i></a>
                                                    @endcan
                                                    @can('edit-terms')
                                                        <a href="{{ route('terms.edit', 1) }}" class="action-icon"> <i
                                                                class="mdi mdi-square-edit-outline"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->

                </div>
            </div>
        </div>
    </div>
@endsection
