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
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
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
                                            @if($count > 0)
                                        @foreach ($clinicdata as $data)
                                            <tr>
                                                
                                                <td>{{ $data->id}}</td>
                                                <td><img src="{{ asset('uploads/userdata/'.$data->logo) }}" width="70px" height="70px" alt="Image"></td>
                                                <td>{{ $data->institute_name}}</td>
                                               
                                                <td>{{ $data->phone}}</td>
                                                <td>{{ $data->email}}</td>
                                                
                                                <td>
                                                    <div class="d-flex gap-3">

                                                        <a href="{{ url('clinic-edit/'.$data->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        
                                                        <!-- <a href="{{ url('clinic-delete/'.$data->id) }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a> -->
                                                        <form action="{{ url('clinic-delete/'.$data->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                                    </form>
                                                    
                                     <a href="{{ url('/impersonate/user/'.$data->email)}}" class="btn btn-success">Login</a>
                                     <!-- <a href="{{ url('/impersonate/user/'.$data->user_id)}}" class="btn btn-success">Login</a> -->
                                    


                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach
                                            @else                                            
                                            <tr>
                                               <td colspan="6" style="
                                                text-align: center;">No record found</td>
                                            </tr>
                                            @endif
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
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>

</body>

</html>