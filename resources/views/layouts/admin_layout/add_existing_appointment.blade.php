
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

    <style>
        .search{
            display: flex;
        }
        .custom-control-label{
            display: inline-block;
            margin: 10px;
            border: 2px solid #ccc;
            padding: 10px;
            cursor: pointer;
        }
        input[type="radio"] {
            display: none; /* hide the default checkbox */
        }
        .disabled-checkbox {
            cursor: not-allowed;
            color: #aaa;
        }


input[type="radio"]:checked + label {
    background-color: #0099ff;
    color: #fff;
}

</style>
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
                $title = "Add Existing Appointment";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <form action="{{ url('update-existing-appointment') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data</h4>
                                <p class="card-title-desc">Fill all information below</p>
                            </div>
                            <div class="card-body">
                               
                                <div class="row" id="form-data" >
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="name">Hospital name </label>
                                                    <select name="hospital_name" id="hospital_name" class="form-control select2">
                                                   <option value="0">Select hospital</option>
                                                   </select>
                                                </div>
                                               
                                                        
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="doc_name">Doctor name </label><br>
                                                    <select name="doc_name" id="doc_name" class="form-control select2">
                                                   <option value="0">Select doctor</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="appoint_date">Appointment Date</label>
                                                    <input type="date" class="form-control" id="appoint_date" name="appoint_date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+4 days')) }}" value="{{ date('Y-m-d') }}">
                                                   
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
                                            <h4 class="card-title">Patient Search</h4>
                                            <!-- <p class="card-title-desc">Fill all information below</p> -->
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-md-6">
                                                <div class="search">
                                                
                                                    <input type="text" name="keyword" id="keyword" placeholder="Search by patient id or patient name" class="form-control" >
                                                    <button id="search_patient"  type="button">Search</button>
                                                
                                                </div>
                                                </div>
                                                <div class="col-md-6"></div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                <div id="patient-container" style="display: none;"></div>
                                                <!-- <span id="patient-btn" class="btn btn-info" style="display: none;"></span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                            
                            <div class="row patient-detail" style="display: none;">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Patient Information</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="name">Name :-</label>
                                                        <input type="hidden" name="patient_id" id="patient_id" />
                                                        <span id="name"></span>
                                                    </div>
                                                                                                    
                                                <div class="mb-3">
                                                    <label for="email">Email:-</label>
                                                    <span id="email"></span>
                                                </div>
                                                
                                               
                                                <div class="mb-3">
                                                    <label for="mobile">Mobile:-</label>
                                                    <span id="mobile"></span>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="dob">Date of birth:-</label>
                                                    <span id="dob"></span>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="patientstatus">Status:-</label>
                                                    <span id="patientstatus"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="full_addrs">Address :-</label>
                                                    <span id="full_addrs"></span>
                                                </div>  
                                                <div class="mb-3">
                                                    <label for="state" class="form-label">State:- </label>
                                                    <span id="state"></span>
                                                </div>
                                                           
                                            </div>
                                            <div class="col-sm-6">                                               
                                                <div class="mb-3">
                                                    <label for="gender">Gender:-</label>
                                                    <span id="gender"></span>
                                                   
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="weight">Weight(in kgs):-</label>
                                                    <span id="weight"></span>
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="blood">Blood:-</label>
                                                    <span id="blood"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="height">Height:-</label>
                                                    <span id="height"></span>                                                   
                                                </div>
                                                <div class="mb-3">
                                                    <label for="longitude">Longitude:- </label>
                                                    <span id="longitude"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="latitude">Latitude:- </label>
                                                    <span id="latitude"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">City:- </label>
                                                    <span id="city"></span>
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
                                            <h4 class="card-title">Available Slots</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row items-container">
                                                        <!-- <div class="col-sm-6"> -->
                                                            
                                                        
                                                        
                                                    


                                                            
                                                           
                                                        <!-- </div> -->
                                                        
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                        </div>
                                                        <div class="col-sm-4">
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <div class="mb-3">
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
        $('#search_patient').click(function() {
            // alert();
            var keyword = $('#keyword').val();
            $.ajax({
                url:"{{ url('search-patient-name') }}",
                type:"GET",
                data:{keyword:keyword},
                success:function(response){
                    
                    var patientContainer = $("#patient-container");
                    patientContainer.empty(); // clear previous results
                    response.patientdata.forEach(function(patient) {
                        var patientBtn = $("<span/>", {
                            class: "btn btn-info mx-2",
                            text: patient.name
                        });
                        patientContainer.append(patientBtn);
                        patientBtn.click(function() {
                            // alert(patient.name);
                            $.ajax({
                                url: "{{ url('get-patient-details') }}",
                                type: "GET",
                                data: {name: patient.name},
                                success: function(data) {
                                    // $("#patient-details").html(JSON.stringify(patientDetails));
                                    $('#name').text(data.patientdetails.name);
                                    $('#patient_id').val(data.patientdetails.id);
                                    $('#email').text(data.patientdetails.email);
                                    $('#mobile').text(data.patientdetails.mobile);
                                    $('#dob').text(data.patientdetails.dob);
                                    $('#patientstatus').text(data.patientdetails.patientstatus);
                                    $('#full_addrs').text(data.patientdetails.full_addrs);
                                    $('#state').text(data.patientdetails.state);
                                    $('#gender').text(data.patientdetails.gender);
                                    $('#weight').text(data.patientdetails.weight);
                                    $('#blood').text(data.patientdetails.blood);
                                    $('#height').text(data.patientdetails.height);
                                    $('#longitude').text(data.patientdetails.longitude);
                                    $('#latitude').text(data.patientdetails.latitude);
                                    $('#city').text(data.patientdetails.city);
                                    
                                    // show the div
                                    $('.patient-detail').show();
                                }
                            });
                        });
                    });


                        $('#patient-container').show();
                }

            });
        });
        $('#hospital_name').on('change', function () {
                var hospital_name = this.value;
                $("#doc_name").html('');
                $.ajax({
                    url: "{{url('dropdown-doctor')}}",
                    type: "POST",
                    data: {
                        hospital_name: hospital_name,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#doc_name').html('<option value="">-- Select Doctor name --</option>');
                        $.each(result.doctornames, function (key, value) {
                            console.log(value);
                            $("#doc_name").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        
                    }
                });
            });
        $('#doc_name').on('change', function () {
                var doctor_id = this.value;
                
                $.ajax({
                    url: "{{url('available-slot')}}",
                    type: "POST",
                    data: {
                        doctor_id: doctor_id,
                        _token: '{{csrf_token()}}'
                    },                    
                    success: function (result) {
                        $('.items-container').html(result.template);
                        
                        
                    }
                });
            });
            
            $.ajax({
                url: "{{ url('dropdown-hospital') }}",
                dataType: 'json',
                success: function(data) {
                    var options = '';
                    $.each(data, function(index, hospitaldata) {
                        options += '<option value="' + hospitaldata.id + '">' + hospitaldata.institute_name + '</option>';
                    });
                    $('#hospital_name').append(options);
                }
            });
            $.ajax({
                url: "{{ url('search-patient') }}",
                dataType: 'json',
                success: function(data) {
                    var options = '';
                    $.each(data, function(index, hospitaldata) {
                        options += '<option value="' + hospitaldata.id + '">' + hospitaldata.institute_name + '</option>';
                    });
                    $('#hospital_name').append(options);
                }
            });
       
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