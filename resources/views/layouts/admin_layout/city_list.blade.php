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
                $title = "City List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-6">
                    
                        <div class="card">
                            <div class="card-body">                            
                            <form action="{{ url('save-city') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                                    
                                    <div class="row" id="form-data" >
                                        <div class="col-12">
                                                <div class="row">
                                                    <label for="state" class="col-sm-3 col-form-label">Name of State</label>
                                                    <div class="col-sm-9 mb-4">
                                                        <select name="state" id="state" class="form-control select2">
                                                            <option value="0">Select state</option>
                                                        </select>
                                                       
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <label for="city" class="col-sm-3 col-form-label">Name of City</label>
                                                    <div class="col-sm-9 mb-4">
                                                        <input id="city" name="city" type="text" class="form-control" required >
                                                        <span id="error_city"></span>
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
                    <div class="col-6">
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
                                                <th class="align-middle">State name</th>
                                                <th class="align-middle">City name</th>
                                                
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count > 0)
                                                @foreach ($statecitydata as $data)
                                                    <tr>
                                                        
                                                        <td>{{ $data->id}}</td>
                                                        <td>{{ $data->state->state}}</td>
                                                        <td>{{ $data->city}}</td>
                                                        
                                                        <td>
                                                            <div class="d-flex gap-3">

                                                                
                                                                <form action="{{ url('city-delete/'.$data->id) }}" method="POST">
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
                                    {{ $statecitydata->links() }}
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
 $('#state').on('keyup',function(){
    var error_state = '';
  var state = $('#state').val();
  var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ url('state_available_check') }}",
    method:"POST",
    data:{state:state, _token:_token},
    success:function(result)
    {
     if(result == 'unique')
     {
      $('#error_state').html('<label class="text-success">state Available</label>');
      $('#state').removeClass('has-error');
    
      $('#create').attr('disabled', false);
     }
     else
     {
      $('#error_state').html('<label class="text-danger">state not Available</label>');
      $('#state').addClass('has-error');
    
      $('#create').attr('disabled', 'disabled');
     }
    }
   });
  
 });
 $('#city').on('keyup',function(){
    var error_city = '';
  var city = $('#city').val();
  var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ url('city_available_check') }}",
    method:"POST",
    data:{city:city, _token:_token},
    success:function(result)
    {
     if(result == 'unique')
     {
      $('#error_city').html('<label class="text-success">city Available</label>');
      $('#city').removeClass('has-error');
    
      $('#create').attr('disabled', false);
     }
     else
     {
      $('#error_city').html('<label class="text-danger">city not Available</label>');
      $('#city').addClass('has-error');
    
      $('#create').attr('disabled', 'disabled');
     }
    }
   });
  
 });
 
});
</script>
</body>

</html>