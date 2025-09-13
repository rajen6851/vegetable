
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
                                    <h4 class="mb-sm-0 font-size-18">Users</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Users</li>
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
                                        <h4 class="card-title">Customer List</h4>
                                        
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>Email</th>
                                                
                                                <th>Start date</th>
                                                
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach($users as $user)
                                            <tr>
                                                <td><img class="rounded-circle" width="35" src="{{asset('admin/images/profile/small/pic1.jpg')}}" alt=""></td>
                                                   <td>{{ $user->name }}</td>
                                                
                                                   <td><a href="javascript:void(0);"><strong>{{ $user->number }}</strong></a></td>
                                                   <td><a href="javascript:void(0);"><strong><span class="__cf_email__" data-cfemail="7811161e17381d00191508141d561b1715">{{ $user->email }}</span></strong></a></td>
                                                   <td>{{ $user->created_at }}</td>
                                            </tr>
                                           @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end cardaa -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
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
 <!-- JAVASCRIPT -->
      
        
        
    </body>

</html>