@include('layout')
<!-- Start Content-->
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>privacy and policy</h4>

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
                                            <td>privacy and policy</td>
                                            <td>
                                                <a href="{{ route('privacy.view', 1) }}"><i class=" mdi mdi-eye"
                                                        class="icon-dual"></i></a>
                                                <a href="{{ route('privacy.edit', 1) }}" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>
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
