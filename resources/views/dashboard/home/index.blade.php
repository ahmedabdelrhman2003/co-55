@include('layout')
<!-- Start Content-->
<div class="content-page">
    <div class="content">
        <div class="container-fluid"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h4>home page photo</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right">
                                    <a href="{{ route('home.create') }}"><button type="button"
                                            class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i
                                                class="mdi mdi-basket mr-1"></i> add home image</button></a>

                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>

                                        <th>photo</th>
                                        <th>image title</th>
                                        <th>activation</th>

                                        <th style="width: 82px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($home as $home)
                                        <tr>

                                            <td class="table-user">
                                                <img src="{{ asset('assets/img/home/' . $home->image) }}"
                                                    alt="table-user" class="mr-2 rounded-circle">

                                            </td>
                                            <td>
                                                {{ $home->title }}
                                            </td>
                                            <td>

                                                <a href=""><i class=" mdi mdi-check-circle"
                                                        class="icon-dual"></i></a>
                                                <a href=""><i class=" mdi mdi-minus-circle"
                                                        class="icon-dual"></i></a>

                                            </td>




                                            <td>
                                                <a href="{{ route('home.view', $home->id) }}"><i class=" mdi mdi-eye"
                                                        class="icon-dual"></i></a>

                                                <a href="{{ route('home.edit', $home->id) }}" class="action-icon">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>

                                                <a href="{{ route('home.destroy', $home->id) }}" class="action-icon"
                                                    onclick="return confirm('Are you sure you want to delete this?')">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <ul class="pagination pagination-rounded justify-content-end my-2">
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->

        </div>
    </div>
</div>
