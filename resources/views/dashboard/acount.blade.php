@include('layout')
@section('title', 'account | co-55 - Admin Dashboard ')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <h4>My Account</h4>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>

                                            <th>name</th>
                                            <th>email</th>
                                            <th>role</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>{{ Auth::user()->name }}</td>
                                            <td>{{ Auth::user()->email }}</td>
                                            <td>{{ $user->role->name }}</td>

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
