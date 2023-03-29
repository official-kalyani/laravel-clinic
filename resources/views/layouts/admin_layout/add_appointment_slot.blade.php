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
                $title = "Appointment Slot Master List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                    
                        <div class="card">
                            <div class="card-body">                            
                            <form action="{{ url('save-appointment-master') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                                    
                            <div class="row" id="form-data" >
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="hospital_id">Hospital name </label>
                                                <select name="hospital_id" id="hospital_id" class="form-select select2">
                                                    <option value="0">Select hospital</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="doctor_id">Doctor name </label><br>
                                                <select name="doctor_id" id="doctor_id" class="form-select select2">
                                                    <option value="0">Select doctor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="date">Date of appointment</label>
                                                <input type="date" class="form-control" id="date" name="date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+7 days')) }}" value="{{ date('Y-m-d') }}">
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="available_category">Availability  Category</label>
                                                <select name="available_category" id="available_category" class="form-select select2">
                                                    <option value="0">Select category</option>
                                                    <option value="15min">15mins slot</option>
                                                    <option value="30min">30mins slot</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="slot_start_time">Slot Start Time</label>
                                                <select name="slot_start_time" id="slot_start_time" class="form-select select2">
                                                    <option value="0">Select Slot Start Time</option>
                                                    <option value="6am">6.00 AM</option>
                                                    <option value="7am">7.00 AM</option>
                                                    <option value="8am">8.00 AM</option>
                                                    <option value="9am">9.00 AM</option>
                                                    <option value="10am">10.00 AM</option>
                                                    <option value="11am">11.00 AM</option>
                                                    <option value="12pm">12.00 PM</option>
                                                    <option value="1pm">1.00 PM</option>
                                                    <option value="2pm">2.00 PM</option>
                                                    <option value="3pm">3.00 PM</option>
                                                    <option value="4pm">4.00 PM</option>
                                                    <option value="5pm">5.00 PM</option>
                                                    <option value="6pm">6.00 PM</option>
                                                    <option value="7pm">7.00 PM</option>
                                                    <option value="8pm">8.00 PM</option>
                                                    <option value="9pm">9.00 PM</option>
                                                    <option value="10pm">10.00 PM</option>
                                                    <option value="11pm">11.00 PM</option>
                                                    <option value="12am">12.00 AM</option>
                                                    <option value="1am">1.00 AM</option>
                                                    <option value="2am">2.00 AM</option>
                                                    <option value="3am">3.00 AM</option>
                                                    <option value="4am">4.00 AM</option>
                                                    <option value="5am">5.00 AM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="slot_end_time">Slot End Time</label>
                                                <select name="slot_end_time" id="slot_end_time" class="form-select select2">
                                                    <option value="0">Select Slot Start Time</option>
                                                    <option value="6am">6.00 AM</option>
                                                    <option value="7am">7.00 AM</option>
                                                    <option value="8am">8.00 AM</option>
                                                    <option value="9am">9.00 AM</option>
                                                    <option value="10am">10.00 AM</option>
                                                    <option value="11am">11.00 AM</option>
                                                    <option value="12pm">12.00 PM</option>
                                                    <option value="1pm">1.00 PM</option>
                                                    <option value="2pm">2.00 PM</option>
                                                    <option value="3pm">3.00 PM</option>
                                                    <option value="4pm">4.00 PM</option>
                                                    <option value="5pm">5.00 PM</option>
                                                    <option value="6pm">6.00 PM</option>
                                                    <option value="7pm">7.00 PM</option>
                                                    <option value="8pm">8.00 PM</option>
                                                    <option value="9pm">9.00 PM</option>
                                                    <option value="10pm">10.00 PM</option>
                                                    <option value="11pm">11.00 PM</option>
                                                    <option value="12am">12.00 AM</option>
                                                    <option value="1am">1.00 AM</option>
                                                    <option value="2am">2.00 AM</option>
                                                    <option value="3am">3.00 AM</option>
                                                    <option value="4am">4.00 AM</option>
                                                    <option value="5am">5.00 AM</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="break_start_time">Break Start Time</label>
                                                <select name="break_start_time" id="break_start_time" class="form-select select2">
                                                    <option value="0">Select Slot Start Time</option>
                                                    <option value="6am">6.00 AM</option>
                                                    <option value="7am">7.00 AM</option>
                                                    <option value="8am">8.00 AM</option>
                                                    <option value="9am">9.00 AM</option>
                                                    <option value="10am">10.00 AM</option>
                                                    <option value="11am">11.00 AM</option>
                                                    <option value="12pm">12.00 PM</option>
                                                    <option value="1pm">1.00 PM</option>
                                                    <option value="2pm">2.00 PM</option>
                                                    <option value="3pm">3.00 PM</option>
                                                    <option value="4pm">4.00 PM</option>
                                                    <option value="5pm">5.00 PM</option>
                                                    <option value="6pm">6.00 PM</option>
                                                    <option value="7pm">7.00 PM</option>
                                                    <option value="8pm">8.00 PM</option>
                                                    <option value="9pm">9.00 PM</option>
                                                    <option value="10pm">10.00 PM</option>
                                                    <option value="11pm">11.00 PM</option>
                                                    <option value="12am">12.00 AM</option>
                                                    <option value="1am">1.00 AM</option>
                                                    <option value="2am">2.00 AM</option>
                                                    <option value="3am">3.00 AM</option>
                                                    <option value="4am">4.00 AM</option>
                                                    <option value="5am">5.00 AM</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="break_end_time">Break End Time</label>
                                                <select name="break_end_time" id="break_end_time" class="form-select select2">
                                                    <option value="0">Select Slot Start Time</option>
                                                    <option value="6am">6.00 AM</option>
                                                    <option value="7am">7.00 AM</option>
                                                    <option value="8am">8.00 AM</option>
                                                    <option value="9am">9.00 AM</option>
                                                    <option value="10am">10.00 AM</option>
                                                    <option value="11am">11.00 AM</option>
                                                    <option value="12pm">12.00 PM</option>
                                                    <option value="1pm">1.00 PM</option>
                                                    <option value="2pm">2.00 PM</option>
                                                    <option value="3pm">3.00 PM</option>
                                                    <option value="4pm">4.00 PM</option>
                                                    <option value="5pm">5.00 PM</option>
                                                    <option value="6pm">6.00 PM</option>
                                                    <option value="7pm">7.00 PM</option>
                                                    <option value="8pm">8.00 PM</option>
                                                    <option value="9pm">9.00 PM</option>
                                                    <option value="10pm">10.00 PM</option>
                                                    <option value="11pm">11.00 PM</option>
                                                    <option value="12am">12.00 AM</option>
                                                    <option value="1am">1.00 AM</option>
                                                    <option value="2am">2.00 AM</option>
                                                    <option value="3am">3.00 AM</option>
                                                    <option value="4am">4.00 AM</option>
                                                    <option value="5am">5.00 AM</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" id="create" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                        <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                    </div>
                            </form>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
<div class="row">
<div class="col-md-12">
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                                                <!-- <i class="bx bx-search-alt search-icon"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                       
                                        <!-- <a href="{{ url('/add-speciality') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>Add </a> -->
                                            
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <th class="align-middle">ID</th>
                                                <th class="align-middle">Doctor Name</th>
                                                <th class="align-middle">Hospital Name</th>
                                                <th class="align-middle">Slot start-end time</th>
                                                <th class="align-middle">Break start-end time</th>
                                                <th class="align-middle">Appointment date</th>                                               
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count > 0)
                                        @foreach ($appointment_master as $data)
                                            <tr>
                                                
                                                <td>{{ $data->id}}</td>
                                                <td>{{ $data->doctorname->name }}</td>
                                                <td>{{ $data->hospitaldata->institute_name }}</td>
                                                <td>{{ $data->slot_start_time }} - {{ $data->slot_end_time}}</td>
                                                <td>{{ $data->break_start_time }} - {{ $data->break_end_time}}</td>
                                                <td>{{ $data->date }}</td>
                                               
                                                
                                                <td>
                                                    <div class="d-flex gap-3">

                                                        <!-- <a href="{{ url('speciality-edit/'.$data->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a> -->
                                                        <form action="{{ url('appointment-master-delete/'.$data->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                                    </form>
                                                    
                                   
                                    
                                    


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
                                    {{ $appointment_master->links() }}
                                </div>
                                
                            </div>
                        </div>
                    </div>
</div>



            </div>
                    
                    
                     <!-- container-fluid -->
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
<script>
$(document).ready(function(){
    $.ajax({
            url: "{{ url('dropdown-hospital') }}",
            dataType: 'json',
            success: function(data) {
                var options = '';
                $.each(data, function(index, hospitaldata) {
                    options += '<option value="' + hospitaldata.id + '">' + hospitaldata.institute_name + '</option>';
                });
                $('#hospital_id').append(options);
            }
        });
    $('#hospital_id').on('change', function () {
            var hospital_name = this.value;
            $("#doctor_id").html('');
            $.ajax({
                url: "{{url('dropdown-doctor')}}",
                type: "POST",
                data: {
                    hospital_name: hospital_name,
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
 
 
});
</script>
</body>

</html>