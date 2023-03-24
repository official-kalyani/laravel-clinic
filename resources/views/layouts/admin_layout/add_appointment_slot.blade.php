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
                    <div class="col-md-6">
                    
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
                                                <select name="hospital_id" id="hospital_id" class="form-control select2">
                                                    <option value="0">Select hospital</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="doctor_id">Doctor name </label><br>
                                                <select name="doctor_id" id="doctor_id" class="form-control select2">
                                                    <option value="0">Select doctor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="date">Date of birth</label>
                                                <input type="date" class="form-control" id="date" name="date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+7 days')) }}">
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="icon">Availability  Category</label>
                                                <select name="doc_name" id="doc_name" class="form-control select2">
                                                    <option value="0">Select category</option>
                                                    <option value="15min">15mins slot</option>
                                                    <option value="30min">30mins slot</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="icon">Slot Start Time</label>
                                                <input id="slot_start_time" name="slot_start_time" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="icon">Slot End Time</label>
                                                <input id="slot_end_time" name="slot_end_time" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="icon">Break Start Time</label>
                                                <input id="break_start_time" name="break_start_time" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="icon">Break End Time</label>
                                                <input id="break_end_time" name="break_end_time" type="text" class="form-control">
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




            </div>
                    <div class="col-md-6">
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
                                                <th class="align-middle">Hospital Name</th>
                                                <th class="align-middle">Date</th>                                                
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count > 0)
                                        @foreach ($appointment_master as $data)
                                            <tr>
                                                
                                                <td>{{ $data->id}}</td>
                                                <td><img src="{{ asset('uploads/symptom/'.$data->icon) }}" width="70px" height="70px" alt="Image"></td>
                                                <td>{{ $data->symptom}}</td>
                                               
                                                
                                                <td>
                                                    <div class="d-flex gap-3">

                                                        <!-- <a href="{{ url('speciality-edit/'.$data->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a> -->
                                                        <form action="{{ url('symptom-delete/'.$data->id) }}" method="POST">
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