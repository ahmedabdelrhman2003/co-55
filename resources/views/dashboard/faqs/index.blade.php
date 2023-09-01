@include('layout')
<!-- Start Content-->
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <h4>FAQs</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right">
                                        <a href="{{ route('faqs.create') }}" style="color: white;">
                                            <button type="button"
                                                class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i
                                                    class="mdi mdi-basket mr-1"> add question</i></button></a>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>question</th>

                                            <th>type</th>


                                            <th style="width: 82px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($faqs as $faq)
                                            <tr>
                                                <td>
                                                    {{ $faq->question }}
                                                </td>
                                                <td><select>
                                                        <option value="{{ $faq->id }}">{{ $faq->type }}</option>

                                                    </select></td>
                                                <td>
                                                    <a href="{{ route('faqs.view', $faq->id) }}"><i class=" mdi mdi-eye"
                                                            class="icon-dual"></i></a>
                                                    <a href="{{ route('faqs.edit', $faq->id) }}" class="action-icon">
                                                        <i class="mdi mdi-square-edit-outline"></i>
                                                    </a>
                                                    <a href="{{ route('faqs.destroy', $faq->id) }}" class="action-icon"
                                                        onclick="return confirm('Are you sure you want to delete this?')">
                                                        <i class="mdi mdi-delete"></i></a>
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
</div>
