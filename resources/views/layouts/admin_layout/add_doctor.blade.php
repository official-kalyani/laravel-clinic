
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
                $title = "Add Doctor";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Personal Information</h4>
                                <p class="card-title-desc">Fill all information below</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('save-institution') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row" id="form-data" >
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="institute_name">Name </label>
                                                    <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input id="email" name="email" type="text" class="form-control">
                                                    <span id="error_email"></span>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="longitude">Mobile</label>
                                                    <input id="longitude" name="longitude" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="logo">Date of birth</label>
                                                    <input id="logo" name="logo" type="date" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="logo">Experience</label>
                                                    <input id="logo" name="logo" type="text" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="logo">Status</label>
                                                    <input id="logo" name="logo" type="text" class="form-control">
                                                </div>
                                                        
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                <label for="institute_name">Designation </label>
                                                    <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address">Password</label>
                                                    <input id="email" name="email" type="text" class="form-control">
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="manufacturerbrand">Landline</label>
                                                    <select class="form-control" id="year_drp_down" name="year_drp_down">
                                                        
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="latitude">Gender</label>
                                                    <input id="latitude" name="latitude" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="logo">Profile picture</label>
                                                    <input id="logo" name="logo" type="file" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="logo">License no</label>
                                                    <input id="logo" name="logo" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <div class="mb-3">
                                                    <label for="logo">About</label>
                                                    <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                               
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Education</h4>
                                <p class="card-title-desc">Fill all information below</p>
                            </div>
                            <div class="card-body">
                               
                                <div class="row" id="form-data" >
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="institute_name">Degree</label>
                                                    <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                        <label for="manufacturerbrand">Passing Year</label>
                                                        <select class="form-control" id="year_drp_down" name="year_drp_down">
                                                            
                                                        </select>
                                                    </div>
                                                
                                                
                                            </div>
                                        </div>
                                                
                                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Speciality</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="speciality">Speciality</label>
                                                               <select name="speciality" id="speciality" class="form-control" >
                                                                 

                                                               </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Financials</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="institute_name">Clinic Fee</label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="institute_name">Commission Fee(in %)</label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="institute_name">Online Fee</label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Address</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="institute_name">Name </label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="institute_name">State </label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="institute_name">Street </label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="institute_name">Address </label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="institute_name">City </label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="institute_name">Zip </label>
                                                                <input id="institute_name" name="institute_name" type="text" class="form-control" required>
                                                            </div>
                                                            <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" id="create" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                           
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
    $(document).ready(function() {
       
        $.ajax({
            url: "{{ url('dropdown-speciality') }}",
            dataType: 'json',
            success: function(data) {
                var options = '';
                $.each(data, function(index, speciality) {
                    options += '<option value="' + speciality.id + '">' + speciality.speciality + '</option>';
                });
                $('#speciality').append(options);
            }
        });
    });
</script>
</body>

</html>