@include('layouts.admin_layout.head-main')

<head>

    <title> | Dason - Admin & Dashboard Template</title>

    @include('layouts.admin_layout.head')

    <!-- select2 css -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/pages/ecommerce-shop.init.js') }}"></script>

    @include('layouts.admin_layout.head-style')


</head>

<body data-topbar="dark">
    <!-- Begin page -->
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
                $title = "Add Clinic";
                ?>
                    @include('layouts.admin_layout.breadcrumb')
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">
                            @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                    <p class="card-title-desc"></p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update-speciality/'.$specialitydata->id) }}" id="userform"
                                        name="userform" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="row" id="form-data" >
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="speciality">Name of Speciality</label>
                                                            <input id="speciality" name="speciality" type="text" class="form-control" value="{{ $specialitydata->speciality}}" required>                                                          
                                                        </div>
                                                       
                                                        
                                                       
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                                <label for="icon">Upload Icon</label>
                                                                <input id="icon" name="icon" type="file"
                                                                    class="form-control">
                                                                <img src="{{ asset('uploads/speciality/'.$specialitydata->icon)}}"
                                                                    width="200" height="180"alt="">
                                                            </div>


                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" id="create"
                                                        class="btn btn-primary waves-effect waves-light">Update</button>
                                                    <button type="button"
                                                        class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

    @include('layouts.admin_layout.footer')
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('layouts.admin_layout.right-sidebar')
    @include('layouts.admin_layout.vendor-scripts')

    <!-- select 2 plugin -->
    <script src="{{ asset('libs/select2/js/select2.min.js')}}"></script>

    <!-- dropzone plugin -->
    <script src="{{ asset('libs/dropzone/min/dropzone.min.js')}}"></script>

    <!-- init js -->
    <script src="{{ asset('js/pages/ecommerce-select2.init.js') }}"></script>
    <script>
    $('#drp-down').on('select2:select', function(e) {
        $("#form-data").css("display", "block");
    });
    </script>
    
    
</body>

</html>