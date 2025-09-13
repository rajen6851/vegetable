
@include('Admin.layout.head')

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('Admin.layout.navbar')
            
            @include('Admin.layout.sidebar')

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
   <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Category</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Category</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <div class="search-box me-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <h4 class="card-title">Category List</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                               <i class="mdi mdi-plus me-1"></i>Add New Catgeory
                                            </button>
                                            
                                            
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                 <th>#</th>
                                                   <th>Name</th>
                                                   <th>Image</th>
                                                  <th>Action</th>
                                                
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $i = 1; ?>
                                
                                 @foreach($categories as $c)
                                    <tr>
                                       <td>{{$i}}</td>
                                       <td>{{ $c->name }}</td>
                                       <td>
                                           
                                           <img src="{{ asset('images/category/' . $c->image) }}" alt="" class="avatar-md p-1">
                                       
                                       
                                       <td>
                                           <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                                    <li><a href="{{url('admin/Category/edit',$c->id)}}" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Edit</a></li>
                                                                    <li><a href="{{url('admin/Category/delete',$c->id)}}" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a></li>
                                                                </ul>
                                                            </div>
                                              
                                       </td> 
                                    </tr>
                                     <?php $i++; ?>
                                    @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end cardaa -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                         <!-- Static Backdrop Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Category Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                     <form action="{{('/admin/Category/store')}}" method="post" enctype="multipart/form-data">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @endif
                                    @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                    @endif
                                    @csrf
                                  <div class="col-xl-12 col-md-6">
                                    <div class="form-group mb-3">
                                         <label class="form-label">Category Name</label>
                                     <input type="text" required=""  name="name" placeholder="Category Name" class="form-control">
                                     @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                   </div>
                                   <div class="col-xl-12 col-md-6">
                                    <div class="form-group mb-3">
                                         <label class="form-label">Image</label>
                                     <input type="file" required="" name="image"  placeholder="Image" class="form-control">
                                    </div>
                                   </div>
                                   <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                  </form>   
                                </div>
                                
                            </div>
                        </div>
                    </div>



                       
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @include('Admin.layout.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        @include('Admin.layout.rightsidebar')
        <!-- /Right-bar -->

        @include('Admin.layout.footjs')

    </body>

</html>