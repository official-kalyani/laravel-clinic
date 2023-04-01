
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
                $title = "Update Appointment";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <form action="{{ url('update-appointment/'.$appointment_data->patient_id) }}" id="userform" name="userform" method="POST"  autocomplete="off">
                @csrf
                @method('PUT')
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
                                                    <select name="hospital_id" id="hospital_id" class="form-control select2">
                                                    @foreach($hospitalinfo as $hospitalname)
                                                        @if($hospitalname->id == $appointment_data->hospital_id)
                                                            <option value="{{ $hospitalname->id }}" selected>{{$hospitalname->institute_name}}</option>
                                                        @else
                                                            <option value="{{ $hospitalname->id }}">{{$hospitalname->institute_name}}</option>
                                                        @endif
                                                    @endforeach
                                                   </select>
                                                </div>
                                               
                                                        
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="doctor_id">Doctor name </label><br>
                                                    <input type="hidden" name="doc_id" value="{{ $appointment_data->doctor_id }}" id="doc_id">
                                                    <select name="doctor_id" id="doctor_id" class="form-control select2">
                                                    @foreach($docinfo as $docname)
                                                                    @if($appointment_data->doctor_id == $docname->id)
                                                                        <option value="{{ $docname->id }}" selected>{{$docname->name}}</option>
                                                                    @else
                                                                        <option value="{{ $docname->id }}">{{ $docname->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="appoint_date">Appointment Date</label>
                                                    <input type="date" class="form-control" id="appoint_date" name="appoint_date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+4 days')) }}" value="{{ $appointment_data->appoint_date }}">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                               
                                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                           
                            
                            <div class="row patient-detail" >
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
                                                        <input type="hidden" name="patient_id" id="patient_id" value="{{ $appointment_data->patient_id }}"/>
                                                        <span id="name">{{ $appointment_data->patientdata->name }}</span>
                                                    </div>
                                                                                                    
                                                <div class="mb-3">
                                                    <label for="email">Email:-</label>
                                                    <span id="email">{{ $appointment_data->patientdata->email }}</span>
                                                </div>
                                                
                                               
                                                <div class="mb-3">
                                                    <label for="mobile">Mobile:-</label>
                                                    <span id="mobile">{{ $appointment_data->patientdata->mobile }}</span>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="dob">Date of birth:-</label>
                                                    <span id="dob">{{ $appointment_data->patientdata->dob }}</span>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="patientstatus">Status:-</label>
                                                    <span id="patientstatus">{{ $appointment_data->patientdata->patientstatus }}</span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="full_addrs">Address :-</label>
                                                    <span id="full_addrs">{{ $appointment_data->patientdata->full_addrs }}</span>
                                                </div>  
                                                <div class="mb-3">
                                                    <label for="state" class="form-label">State:- </label>
                                                    <span id="state">{{ $appointment_data->patientdata->statename->state }}</span>
                                                </div>
                                                           
                                            </div>
                                            <div class="col-sm-6">                                               
                                                <div class="mb-3">
                                                    <label for="gender">Gender:-</label>
                                                    <span id="gender">{{ $appointment_data->patientdata->gender }}</span>
                                                   
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="weight">Weight(in kgs):-</label>
                                                    <span id="weight">{{ $appointment_data->patientdata->weight }}</span>
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="blood">Blood Group:-</label>
                                                    <span id="blood">{{ $appointment_data->patientdata->blood }}</span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="height">Height:-</label>
                                                    <span id="height">{{ $appointment_data->patientdata->height }}</span>                                                   
                                                </div>
                                                <div class="mb-3">
                                                    <label for="longitude">Longitude:- </label>
                                                    <span id="longitude">{{ $appointment_data->patientdata->longitude }}</span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="latitude">Latitude:- </label>
                                                    <span id="latitude">{{ $appointment_data->patientdata->latitude }}</span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">City:- </label>
                                                    <span id="city">{{ $appointment_data->patientdata->cityname->city }}</span>
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
       
        // alert(doc_id);
        $('#hospital_id').on('change', function () {
                var hospital_id = this.value;
                $("#doctor_id").html('');
                $.ajax({
                    url: "{{url('dropdown-doctor')}}",
                    type: "POST",
                    data: {
                        hospital_name: hospital_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#doctor_id').html('<option value="">-- Select Doctor name --</option>');
                        $.each(result.doctornames, function (key, value) {
                            console.log(value);
                            $("#doctor_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        
                    }
                });
            });
        $('#doctor_id').on('change', function () {
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
                url: "{{ url('search-patient') }}",
                dataType: 'json',
                success: function(data) {
                    var options = '';
                    $.each(data, function(index, hospitaldata) {
                        options += '<option value="' + hospitaldata.id + '">' + hospitaldata.institute_name + '</option>';
                    });
                    $('#hospital_id').append(options);
                }
            });
            
       
    });
    // code for slot
    $(document).ready(function(){
        var doc_id = $('#doc_id').val();
        var patient_id = $('#patient_id').val();
        $.ajax({
                        url: "{{ url('show-available-slot') }}",
                        type: "POST",
                        data: {
                            doc_id: doc_id,
                            patient_id: patient_id,
                            _token: '{{csrf_token()}}'
                        }, 
                        success: function (result) {
                            console.log(result.template);
                                $('.items-container').html(result.template);
                                
                                
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