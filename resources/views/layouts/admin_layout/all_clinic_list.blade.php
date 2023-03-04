@include('layouts.admin_layout.head-main')

<head>

    <title> | Dason - Admin & Dashboard Template</title>

    @include('layouts.admin_layout.head')

    @include('layouts.admin_layout.head-style')

</head>


<!-- Begin page -->
<body data-topbar="dark">
<div id="layout-wrapper">

@include('layouts.admin_layout.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?php
                $maintitle = "Ecommerce";
                $title = "Institution List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Search...">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                       
                                        <a href="{{ url('/add-clinic') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>Add </a>
                                            <!-- <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Institution</button> -->
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <th class="align-middle">ID</th>
                                                <th class="align-middle">Logo</th>
                                                <th class="align-middle">Institute Name</th>
                                                <th class="align-middle">Phone</th>
                                                <th class="align-middle">Email</th>
                                                
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($clinicdata as $data)
                                            <tr>
                                                
                                                <td>{{ $data->id}}</td>
                                                <td><img src="{{ asset('uploads/userdata/'.$data->logo) }}" width="70px" height="70px" alt="Image"></td>
                                                <td>{{ $data->institute_name}}</td>
                                               
                                                <td>{{ $data->phone}}</td>
                                                <td>{{ $data->email}}</td>
                                                
                                                <td><div class="d-flex gap-3">
                                                        <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <form action="{{ url('products.destroy',$data->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                        </form>
                                                        <a href="javascript:void(0);" class="btn btn-success">Login</a>
                                                    </div></td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $clinicdata->links() }}
                                </div>
                                <!-- <ul class="pagination pagination-rounded justify-content-end mb-2">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                            <i class="mdi mdi-chevron-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                            <i class="mdi mdi-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->




            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.admin_layout.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('layouts.admin_layout.right-sidebar') 
@include('layouts.admin_layout.vendor-scripts')


</body>

</html>