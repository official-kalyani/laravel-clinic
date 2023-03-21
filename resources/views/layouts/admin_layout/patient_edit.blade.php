
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
                $title = "Edit patient";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <form action="{{ url('update-patient/'.$patientdata->id) }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Personal Information</h4>
                                <p class="card-title-desc">Fill all information below</p>
                            </div>
                            <div class="card-body">
                               
                                <div class="row" id="form-data" >
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                                    <label for="name">Name </label>
                                                    <input id="name" name="name" type="text" class="form-control" value="{{ $patientdata->name}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cpassword">Confirm Password</label>
                                                    <input id="cpassword" name="cpassword" type="password" class="form-control" onkeyup="validate_password()">
                                                    <span id="wrong_pass_alert"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input id="email" name="email" type="text" class="form-control" value="{{ $patientdata->email}}">
                                                    <span id="error_email"></span>
                                                </div>
                                                
                                               
                                                <div class="mb-3">
                                                    <label for="mobile">Mobile</label>
                                                    <input id="mobile" name="mobile" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" value="{{ $patientdata->mobile}}">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="dob">Date of birth</label>
                                                    <input id="dob" name="dob" type="date" class="form-control" value="{{ $patientdata->dob }}">
                                                </div>
                                                
                                                
                                                <div class="mb-3">
                                                    <label for="patientstatus">Status</label>
                                                   <select name="patientstatus" id="patientstatus" class="form-control">
                                                    <option value="0">Select status</option>
                                                        <option value="active" @if ($patientdata->patientstatus == 'active')
                                                            selected="selected"
                                                            @endif >Active</option>
                                                        <option value="inactive" @if ($patientdata->patientstatus == 'inactive')
                                                            selected="selected"
                                                            @endif>Inactive</option>
                                                   </select>
                                                </div>
                                                        
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="password">Password</label>
                                                    <input id="password" name="password" type="password" class="form-control">                                                    
                                                </div>
                                                <div class="mb-3">
                                                <label for="latitude">Gender</label>
                                                   <select name="gender" id="gender" class="form-control">
                                                    <option value="0">Select gender</option>
                                                    <option value="male" @if ($patientdata->gender == 'male')
                                                            selected="selected"
                                                            @endif >Male</option>
                                                    <option value="female" @if ($patientdata->gender == 'female')
                                                            selected="selected"
                                                            @endif>Female</option>
                                                   </select>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="weight">Weight(in kgs)</label>
                                                    <input id="weight" name="weight" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" value="{{ $patientdata->weight }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="blood">Blood</label>
                                                    <input id="blood" name="blood" type="text" class="form-control" value="{{ $patientdata->blood }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="height">Height</label>
                                                    <input id="height" name="height" type="text" class="form-control"  value="{{ $patientdata->height }}">
                                                </div>
                                                <div class="mb-3">
                                                    
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
                                            <h4 class="card-title">Profile </h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                            <label for="profilepic">Add image</label>
                                                                <input id="profilepic" name="profilepic" type="file" class="form-control">
                                                                <img src="{{ asset('uploads/patientfile/'.$patientdata->profilepic)}}"
                                                                width="200" height="180"alt="">
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
                                                                <label for="full_addrs">Address </label>
                                                                <input id="full_addrs" name="full_addrs" type="text" class="form-control" value="{{ $patientdata->full_addrs }}">
                                                            </div>
                                                            
                                                            <div class="mb-3">
                                                                <label for="longitude">Longitude </label>
                                                                <input id="longitude" name="longitude" type="text" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" class="form-control" value="{{ $patientdata->longitude }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="latitude">Latitude </label>
                                                                <input id="latitude" name="latitude" type="text" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" class="form-control" value="{{ $patientdata->latitude }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                        <div class="mb-3">
                                                                <label for="state" class="form-label">State </label><br>
                                                                <select name="state" id="state" class="form-select select2" >
                                                                @foreach($states as $state)
                                                                    @if($patientdata->state_id == $state->id)
                                                                        <option value="{{ $state->id }}" selected>{{$state->state}}</option>
                                                                    @else
                                                                        <option value="{{ $state->id }}">{{$state->state}}</option>
                                                                    @endif
                                                                @endforeach
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="city" class="form-label">City </label><br>
                                                                
                                                                <select name="city" id="city" class="select2 form-select" >
                                                                @foreach($citynames as $cityname)
                                                                    @if($patientdata->city == $cityname->id)
                                                                        <option value="{{ $cityname->id }}" selected>{{$cityname->city}}</option>
                                                                    @else
                                                                        <option value="{{ $cityname->id }}">{{$cityname->city}}</option>
                                                                    @endif
                                                                @endforeach
                                                                </select>
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
</form>
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
    $(document).ready(function() {
       
        
    });
    function validate_password(){
        var pass = document.getElementById('password').value;
            var confirm_pass = document.getElementById('cpassword').value;
            if (pass != '') {
                if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML
                  = '☒ Use same password';
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