@include('layout')
<div class="content-page">

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                @if (Session::has('faild'))
                                    <div class="alert alert-danger">{{ Session::get('faild') }}</div>
                                @endif

                                <div class="col-md-6">
                                    <h4>Admins</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right">
                                        <button type="button"
                                            class="btn btn-danger waves-effect waves-light mb-2 mr-2">
                                            <a style="color: white;" href="{{ route('auth.create') }}"><i
                                                    class="mdi mdi-basket mr-1"></i> add admin
                                            </a>
                                        </button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>

                                            <th>name</th>
                                            <th>email</th>
                                            <th style="width: 82px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $userz)
                                            <tr>
                                                <td>
                                                    {{ $userz->name }}
                                                </td>
                                                <td>
                                                    {{ $userz->email }}
                                                </td>
                                                <td>

                                                    <a href="{{ route('auth.destroy', $userz->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this?')"
                                                        class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

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
