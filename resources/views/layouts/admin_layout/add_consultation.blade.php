
@include('layouts.admin_layout.head-main')

<head>

    <title> | Dason - Admin & Dashboard Template</title>

    @include('layouts.admin_layout.head')

    <!-- select2 css -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/pages/ecommerce-shop.init.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/o9ixq8pk7ojbpm7wqbyrzwomj7uv41yuckgycjn5b7rczyfe/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @include('layouts.admin_layout.head-style')

    <style>
        /* hero section */
        .hero-section {
  background-color: #f8f9fa;
  padding: 80px 0;
}

.hero-left img {
  width: 100px;
  height: 100px;
  margin-bottom: 20px;
}

.hero-left h2 {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}

.hero-left p {
  font-size: 12px;
  margin-bottom: 5px;
}

.hero-right h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.hero-right p {
  font-size: 18px;
  margin-bottom: 5px;
}

        /* hero section */
        #wrong_pass_alert{
            position: absolute;
            top: 28px;
            left:508px;
        }
       .cpass{
        position: relative;
           
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
        /* input[type="checkbox"] {
            display: none; 
        } */
        .disabled-checkbox {
            cursor: not-allowed;
            color: #aaa;
        }


input[type="radio"]:checked + label {
    background-color: #0099ff;
    color: #fff;
}
/* input[type="checkbox"]:checked + label {
    background-color: #0099ff;
    color: #fff;
} */

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
                $title = "Add New Consultation";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <form action="{{ url('save-new-appointment') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <!-- <section class="hero-section">
                                    <div class="container">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="hero-left">
                                            <img src="{{ asset('uploads/medicine-logo-png.png') }}" alt="Hospital Logo">
                                            <h2>Doctor Information</h2>
                                            <p>Doctor Name</p>
                                            <p>Doctor Specialty</p>
                                            <p>Doctor Availability</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="hero-right">
                                            <h2>Patient Information</h2>
                                            <p>Patient Name</p>
                                            <p>Patient Condition</p>
                                            <p>Patient Location</p>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </section> -->
                                <div class="mt-4 border p-4">

                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div>
                                                    <div class="d-flex">
                                                        <img src="{{ asset('uploads/medicine-logo-png.png') }}" class="avatar-sm rounded-circle" alt="img">
                                                        <div class="flex-1 ms-4">
                                                            <h5 class="mb-2 font-size-15 text-primary">Jerry Rossiter</h5>
                                                            <h5 class="text-muted font-size-15">kuwait</h5>
                                                            <p class="text-muted">65 Followers, 86 Reviews</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 order-md-2">
                                                <div>
                                                <h5 class="mb-2 font-size-15 text-primary">Patient name</h5>
                                                <h5 class="mb-2 font-size-12 text-primary">Mobile</h5>
                                                    <p class="text-muted">
                                                        Gender:Male|Age-37yrs<br/>
                                                        PatientId-1023<br/>
                                                        Date of Birth-21-01-93<br/>
                                                        Address-Old town
                                                    </p>
                                                    <p class="text-muted">
                                                        
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!-- end -->
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
                                            <h4 class="card-title">Patient Information</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="name">Name </label>
                                                    <input id="name" name="name" type="text" class="form-control" >
                                                </div>
                                                <div class="mb-3 cpass">
                                                    <label for="cpassword">Confirm Password</label>
                                                    <input id="cpassword" name="cpassword" type="password" class="form-control" onkeyup="validate_password()">
                                                    <span id="wrong_pass_alert" style="font-size: 24px;"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input id="email" name="email" type="text" class="form-control">
                                                    <span id="error_email"></span>
                                                </div>
                                                
                                               
                                                <div class="mb-3">
                                                    <label for="mobile">Mobile</label>
                                                    <input id="mobile" name="mobile" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="dob">Date of birth</label>
                                                    <input id="dob" name="dob" type="date" class="form-control">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="patientstatus">Status</label>
                                                   <select name="patientstatus" id="patientstatus" class="form-control">
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                   </select>
                                                </div>
                                                        
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="password">Password</label>
                                                    <input id="password" name="password" type="password" class="form-control">                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="latitude">Gender</label><br>
                                                   <select name="gender" id="gender" class="form-control select2">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                   </select>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="weight">Weight(in kgs)</label>
                                                    <input id="weight" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" name="weight" type="text" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="blood">Blood</label>
                                                    <input id="blood" name="blood" type="text" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="height">Height</label>
                                                    <input id="height" name="height" type="text" class="form-control">
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
                                                <h4 class="card-title">Profile</h4>
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
                                                        <div class="col-sm-12">
                                                        <textarea id="summernote" name="editordata"></textarea>
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
$(document).ready(function() {
  $('#summernote').summernote();
});

    </script>

<script>
    $(document).ready(function() {
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
            $('#state').on('change', function () {
                var stateid = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('dropdown-city')}}",
                    type: "POST",
                    data: {
                        stateid: stateid,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city').html('<option value="">-- Select City --</option>');
                        $.each(result, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.city + '</option>');
                        });
                        
                    }
                });
            });
        $.ajax({
            url: "{{ url('dropdown-state') }}",
            dataType: 'json',
            success: function(data) {
                var options = '';
                $.each(data, function(index, state) {
                    options += '<option value="' + state.id + '">' + state.state + '</option>';
                });
                $('#state').append(options);
            }
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
       
    });
    function validate_password(){
        var pass = document.getElementById('password').value;
            var confirm_pass = document.getElementById('cpassword').value;
            if (pass != '') {
                if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML
                  = '&#10006';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '&#10004;';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
            }
            
    }
    
</script>


</body>

</html>