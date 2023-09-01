   @include('layout')
   <!-- Start Content-->
   <div class="content-page">
       <div class="content">
           <div class="container-fluid">
               <!-- start page title -->
               <div class="row">
                   <div class="col-12">
                       <div class="page-title-box">
                           <div class="page-title-right">
                               <ol class="breadcrumb m-0">

                                   <li class="breadcrumb-item active">Product Edit</li>
                               </ol>
                           </div>
                           <h4 class="page-title">Add Location</h4>
                       </div>
                   </div>
               </div>
               <!-- end page title -->
               <div class="row">
                   <div class="col-lg-6">
                       <div class="card-box">
                           <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
                           <form action="{{ route('locations.store') }}" method="POST" enctype="multipart/form-data">
                               @csrf

                               <div class="form-group mb-3">
                                   <label for="product-name">Location Name <span class="text-danger">*</span></label>
                                   <input type="text" name="name" value="{{ old('name') }}" id="product-name"
                                       class="form-control" placeholder="write here">
                                   @error('name')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="form-group mb-3">
                                   <label for="product-description">service Description <span
                                           class="text-danger">*</span></label>
                                   <textarea class="form-control" value="{{ old('description') }}" name="description" id="product-description"
                                       rows="5" placeholder="Please enter description"></textarea>
                                   @error('description')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="form-group mb-3">
                                   <label for="product-description">Location article <span
                                           class="text-danger">*</span></label>
                                   <textarea class="form-control" value="{{ old('article') }}" name="article" id="product-description" rows="5"
                                       placeholder="Please enter description"></textarea>
                                   @error('article')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">location Image</h5>
                               <div class="fallback">
                                   <input type="file" value="{{ old('image') }}" name="image" type="file" />
                                   @error('image')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                       </div> <!-- end card-box -->
                   </div> <!-- end col -->
                   <div class="col-lg-6">
                       <div class="card-box">
                           <div id="show_item">
                               <div class="row">
                                   <label for="product-name">icon Name <span class="text-danger">*</span></label>
                                   <input type="text" id="icon_name" name="icon_name[]" class="form-control">
                                   @error('icon_name')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                   <hr>
                                   <label for="product-name">icon image <span class="text-danger">*</span></label>
                                   <input type="file" id="icon_image" name="icon_image[]" class="form-control">
                                   @error('icon_image')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                   <hr>
                                   <label for="product-name">icon title <span class="text-danger">*</span></label>
                                   <input type="text" name="icon_title[]" class="form-control">
                                   @error('icon_title')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                   <hr>
                               </div>
                           </div>
                           <div id="show_item">
                               <div class="row">
                                   <label for="product-name">icon Name <span class="text-danger">*</span></label>
                                   <input type="text" id="icon_name" name="icon_name[]" class="form-control">
                                   @error('icon_name')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                   <hr>
                                   <label for="product-name">icon image <span class="text-danger">*</span></label>
                                   <input type="file" id="icon_image" name="icon_image[]" class="form-control">
                                   @error('icon_image')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                   <hr>
                                   <label for="product-name">icon title <span class="text-danger">*</span></label>
                                   <input type="text" name="icon_title[]" class="form-control">
                                   @error('icon_title')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                   <hr>
                                   <hr>
                               </div>
                           </div>
                           <div id="show_item">
                               <div class="row">
                                   <label for="product-name">icon Name <span class="text-danger">*</span></label>
                                   <input type="text" id="icon_name" name="icon_name[]" class="form-control">
                                   @error('icon_name')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                   <hr>
                                   <label for="product-name">icon image <span class="text-danger">*</span></label>
                                   <input type="file" id="icon_image" name="icon_image[]" class="form-control">
                                   @error('icon_image')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                   <hr>
                                   <label for="product-name">icon title <span class="text-danger">*</span></label>
                                   <input type="text" id="icon_image" name="icon_title[]" class="form-control">
                                   @error('icon_title')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror

                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- end col-->
           </div> <!-- end col-->
       </div>
       <!-- end row -->
       <div class="row content-flued">
           <div class="card-box">
               <div class="col-12">
                   <div class="col-3">
                       <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">location Image</h5>
                       <div class="fallback">
                           <input type="file" name="location_image[]" />
                           @error('image')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                   </div>
                   <div class="col-3">
                       <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">location Image</h5>
                       <div class="fallback">
                           <input type="file" name="location_image[]" type="file" />
                           @error('location_image')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                   </div>
                   <div class="col-3">
                       <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">location Image</h5>
                       <div class="fallback">
                           <input type="file" name="location_image[]" type="file" />
                           @error('image')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-12">
               <div class="text-center mb-3">
                   <button type="submit" id="add_btn"
                       class="btn w-sm btn-success waves-effect waves-light">Save</button>
               </div>
           </div> <!-- end col -->
       </div>
       </form>
   </div>
   </div>
   <!-- end row -->
   </div> <!-- container -->
   </div>
   </div>
   </div>
