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
                $title = "Speciality List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-6">
                    
                        <div class="card">
                            <div class="card-body">                            
                            <form action="{{ url('save-speciality') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                                    
                                    <div class="row" id="form-data" >
                                        <div class="col-12">
                                           
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="speciality">Name of Speciality</label>
                                                            <input id="speciality" name="speciality" type="text" class="form-control" required >
                                                            <span id="error_speciality"></span>
                                                        </div>
                                                        
                                                       
                                                       
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <div class="mb-3">
                                                            <label for="icon">Upload icon</label>
                                                            <input id="icon" name="icon" type="file" class="form-control">
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
                                                <th class="align-middle">Icon</th>
                                                <th class="align-middle">Speciality Name</th>
                                                
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count > 0)
                                        @foreach ($specialitydata as $data)
                                            <tr>
                                                
                                                <td>{{ $data->id}}</td>
                                                <td><img src="{{ asset('uploads/speciality/'.$data->icon) }}" width="70px" height="70px" alt="Image"></td>
                                                <td>{{ $data->speciality}}</td>
                                               
                                                
                                                <td>
                                                    <div class="d-flex gap-3">

                                                        <!-- <a href="{{ url('speciality-edit/'.$data->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a> -->
                                                        <form action="{{ url('speciality-delete/'.$data->id) }}" method="POST">
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
                                    {{ $specialitydata->links() }}
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

 $('#speciality').on('keyup',function(){
    var error_speciality = '';
  var speciality = $('#speciality').val();
  var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ url('speciality_available_check') }}",
    method:"POST",
    data:{speciality:speciality, _token:_token},
    success:function(result)
    {
     if(result == 'unique')
     {
      $('#error_speciality').html('<label class="text-success">speciality Available</label>');
      $('#speciality').removeClass('has-error');
    
      $('#create').attr('disabled', false);
     }
     else
     {
      $('#error_speciality').html('<label class="text-danger">speciality not Available</label>');
      $('#speciality').addClass('has-error');
    
      $('#create').attr('disabled', 'disabled');
     }
    }
   });
  
 });
 
});
</script>
</body>

</html>