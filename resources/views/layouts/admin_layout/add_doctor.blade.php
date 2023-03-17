
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

                <form action="{{ url('save-doctor') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
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
                                                    <label for="name">Hospital name </label>
                                                    <select name="hospital_name" id="hospital_name" class="form-control select2">
                                                   <option value="0">Select hospital</option>
                                                   </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name">Name </label>
                                                    <input id="name" name="name" type="text" class="form-control" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input id="email" name="email" type="text" class="form-control">
                                                    <span id="error_email"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cpassword">Confirm Password</label>
                                                    <input id="cpassword" name="cpassword" type="password" class="form-control" onkeyup="validate_password()">
                                                    <span id="wrong_pass_alert"></span>
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
                                                    <label for="experience">Experience</label>
                                                    <input id="experience" name="experience" type="text" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="docstatus">Status</label>
                                                   <select name="docstatus" id="docstatus" class="form-control">
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                   </select>
                                                </div>
                                                        
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                <label for="designation">Designation </label>
                                                    <input id="designation" name="designation" type="text" class="form-control" >
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password">Password</label>
                                                    <input id="password" name="password" type="password" class="form-control">
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="landline">Landline</label>
                                                    <input type="text" name="landline" id="landline" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="latitude">Gender</label>
                                                   <select name="gender" id="gender" class="form-control">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                   </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="profilepic">Profile picture</label>
                                                    <input id="profilepic" name="profilepic" type="file" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="licenseno">License no</label>
                                                    <input id="licenseno" name="licenseno" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <div class="mb-3">
                                                    <label for="about">About</label>
                                                    <textarea class="form-control" id="about" name="about" rows="5"></textarea>
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
                                            <h4 class="card-title">Education</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="degree">Degree</label>
                                                                <input id="degree" name="degree" type="text" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                            <label for="pyear" class="form-label">Passing Year</label><br>
                                                            <select class="select2 form-select" id="pyear" name="pyear">
                                                                
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
                                                                <label for="speciality">Speciality</label><br>
                                                               <select name="speciality" id="speciality" class="form-control select2" >
                                                                 

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
                                                                <label for="clinicfee">Clinic Fee</label>
                                                                <input id="clinicfee" name="clinicfee" type="text" class="form-control" >
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="commissionfee">Commission Fee(in %)</label>
                                                                <input id="commissionfee" name="commissionfee" type="text" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="onlinefee">Online Fee</label>
                                                                <input id="onlinefee" name="onlinefee" type="text" class="form-control" >
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
                                                            <!-- <div class="mb-3">
                                                                <label for="addrs_name">Name </label>
                                                                <input id="addrs_name" name="addrs_name" type="text" class="form-control" >
                                                            </div> -->
                                                            <div class="mb-3">
                                                                <label for="state" class="form-label">State </label><br>
                                                                <select name="state" id="state" class="form-select select2" ></select>
                                                               
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="street">Street </label>
                                                                <input id="street" name="street" type="text" class="form-control" >
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="zip">Zip </label>
                                                                <input id="zip" name="zip" type="text" class="form-control" >
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="full_addrs">Address </label>
                                                                <input id="full_addrs" name="full_addrs" type="text" class="form-control" >
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="city" class="form-label">City </label><br>
                                                                
                                                                <select name="city" id="city" class="select2 form-select" ></select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="zip">&nbsp;</label>
                                                               
                                                            </div>
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
    let dateDropdown = document.getElementById('pyear'); 
       
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
const dropdown = document.getElementById("state");
var statelist = [ 'Andhra Pradesh','Arunachal Pradesh','Assam', 'Bihar','Chhattisgarh','Goa','Gujarat','Haryana','Himachal Pradesh','Jammu &amp; Kashmir','Jharkhand','Karnataka','Kerala', 'Madhya Pradesh','Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha','Punjab','Rajasthan', 'Sikkim','Tamil Nadu', 'Tripura', 'Telangana', 'Uttarakhand', 'Uttar Pradesh','West Bengal'];

for (let i = 0; i < statelist.length; i++) {
  const option = document.createElement("option");
  option.value = statelist[i];
  option.text = statelist[i];
  dropdown.appendChild(option);
}
</script>
<script>
const citydropdown = document.getElementById("city");
var citylist = [ 'Adilabad',
			'Anantapur',
			'Chittoor',
			'Kakinada',
			'Guntur',
			'Hyderabad',
			'Karimnagar',
			'Khammam',
			'Krishna',
			'Kurnool',
			'Mahbubnagar',
			'Medak',
			'Nalgonda',
			'Nizamabad',
			'Ongole',
			'Hyderabad',
			'Srikakulam',
			'Nellore',
			'Visakhapatnam',
			'Vizianagaram',
			'Warangal',
			'Eluru',
			'Kadapa','Anjaw',
			'Changlang',
			'East Siang',
			'Kurung Kumey',
			'Lohit',
			'Lower Dibang Valley',
			'Lower Subansiri',
			'Papum Pare',
			'Tawang',
			'Tirap',
			'Dibang Valley',
			'Upper Siang',
			'Upper Subansiri',
			'West Kameng',
			'West Siang','Baksa',
			'Barpeta',
			'Bongaigaon',
			'Cachar',
			'Chirang',
			'Darrang',
			'Dhemaji',
			'Dima Hasao',
			'Dhubri',
			'Dibrugarh',
			'Goalpara',
			'Golaghat',
			'Hailakandi',
			'Jorhat',
			'Kamrup',
			'Kamrup Metropolitan',
			'Karbi Anglong',
			'Karimganj',
			'Kokrajhar',
			'Lakhimpur',
			'Marigaon',
			'Nagaon',
			'Nalbari',
			'Sibsagar',
			'Sonitpur',
			'Tinsukia',
			'Udalguri','Araria',
			'Arwal',
			'Aurangabad',
			'Banka',
			'Begusarai',
			'Bhagalpur',
			'Bhojpur',
			'Buxar',
			'Darbhanga',
			'East Champaran',
			'Gaya',
			'Gopalganj',
			'Jamui',
			'Jehanabad',
			'Kaimur',
			'Katihar',
			'Khagaria',
			'Kishanganj',
			'Lakhisarai',
			'Madhepura',
			'Madhubani',
			'Munger',
			'Muzaffarpur',
			'Nalanda',
			'Nawada',
			'Patna',
			'Purnia',
			'Rohtas',
			'Saharsa',
			'Samastipur',
			'Saran',
			'Sheikhpura',
			'Sheohar',
			'Sitamarhi',
			'Siwan',
			'Supaul',
			'Vaishali',
			'West Champaran',
			'Chandigarh','Bastar',
			'Bijapur',
			'Bilaspur',
			'Dantewada',
			'Dhamtari',
			'Durg',
			'Jashpur',
			'Janjgir-Champa',
			'Korba',
			'Koriya',
			'Kanker',
			'Kabirdham (Kawardha)',
			'Mahasamund',
			'Narayanpur',
			'Raigarh',
			'Rajnandgaon',
			'Raipur',
			'Surguja','Angul',
			'Boudh (Bauda)',
			'Bhadrak',
			'Balangir',
			'Bargarh (Baragarh)',
			'Balasore',
			'Cuttack',
			'Debagarh (Deogarh)',
			'Dhenkanal',
			'Ganjam',
			'Gajapati',
			'Jharsuguda',
			'Jajpur',
			'Jagatsinghpur',
			'Khordha',
			'Kendujhar (Keonjhar)',
			'Kalahandi',
			'Kandhamal',
			'Koraput',
			'Kendrapara',
			'Malkangiri',
			'Mayurbhanj',
			'Nabarangpur',
			'Nuapada',
			'Nayagarh',
			'Puri',
			'Rayagada',
			'Sambalpur',
			'Subarnapur (Sonepur)',
			'Sundergarh',];

for (let i = 0; i < citylist.length; i++) {
  const option = document.createElement("option");
  option.value = citylist[i];
  option.text = citylist[i];
  citydropdown.appendChild(option);
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