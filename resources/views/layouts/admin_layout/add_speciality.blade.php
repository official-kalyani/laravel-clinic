
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
                $title = "Add Speciality";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                    
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                                <p class="card-title-desc"></p>
                            </div>
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