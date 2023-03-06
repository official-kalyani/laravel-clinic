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
                                    <h4 class="card-title">Basic Information</h4>
                                    <p class="card-title-desc">Fill all information below</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update-institution/'.$clinicdata->id) }}" id="userform"
                                        name="userform" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="control-label">Register Institution</label>
                                                    <select class="form-control select2" id="drp-down" name="institute_type">
                                                        <option>Select options</option>
                                                        <option value="clinic"  @if ($clinicdata->institute_type == 'clinic')
                                                            selected="selected"
                                                            @endif >Clinic Registration</option>
                                                        <option value="hospital" @if ($clinicdata->institute_type == 'hospital')
                                                            selected="selected"
                                                            @endif>Hospital Registration</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="form-data" >
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="institute_name">Name of the Institution</label>
                                                            <input id="institute_name" name="institute_name" type="text"
                                                                value="{{ $clinicdata->institute_name}}"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone">Phone</label>
                                                            <input id="phone" name="phone" type="text"
                                                                class="form-control" value="{{ $clinicdata->phone }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email">Email</label>
                                                            <input id="email" name="email" type="text"
                                                                class="form-control" value="{{ $clinicdata->email  }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="longitude">Longitude</label>
                                                            <input id="longitude" name="longitude" type="text"
                                                                class="form-control"
                                                                value="{{ $clinicdata->longitude  }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="logo">Upload logo</label>
                                                            <input id="logo" name="logo" type="file"
                                                                class="form-control">
                                                            <img src="{{ asset('uploads/userdata/'.$clinicdata->logo)}}"
                                                                width="200" height="180"alt="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="cpassword">Confirm Password</label>
                                                            <input id="cpassword" name="cpassword" type="password"
                                                                class="form-control" onkeyup="validate_password()">
                                                            <span id="wrong_pass_alert"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="address">Address</label>
                                                            <textarea class="form-control" id="address" name="address"
                                                                rows="5">{{ $clinicdata->address }}</textarea>

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="manufacturerbrand">Year of Establishment</label>
                                                            <select class="form-control" id="year_drp_down"
                                                                name="year_drp_down"
                                                                value="{{ $clinicdata->year_drp_down }}">

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="latitude">Latitude</label>
                                                            <input id="latitude" name="latitude" type="text"
                                                                class="form-control"
                                                                value="{{ $clinicdata->latitude }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password">Password</label>
                                                            <input id="password" name="password" type="password"
                                                                class="form-control">
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
    <script>
    let dateDropdown = document.getElementById('year_drp_down');

    let currentYear = new Date().getFullYear();
    let earliestYear = 1970;
    while (currentYear >= earliestYear) {
        let dateOption = document.createElement('option');
        dateOption.text = currentYear;
        dateOption.value = currentYear;
        dateDropdown.add(dateOption);
        currentYear -= 1;
    }
    </script>
    <script>
    function validate_password() {
        var pass = document.getElementById('password').value;
        var confirm_pass = document.getElementById('cpassword').value;
        if (pass != '') {
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML = '☒ Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }

    }
    </script>
</body>

</html>