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
                $title = "Patient information List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                            <form action="" method="POST">
                                                @csrf
                                                <input type="text" class="form-control" placeholder="Search..." id="search">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                       
                                        <a href="{{ url('/add-patient') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>Add </a>
                                            
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <th class="align-middle">ID</th>
                                                <th class="align-middle">Name</th>
                                                <th class="align-middle">Email</th>
                                                <th class="align-middle">Profile picture</th>
                                                
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count > 0)
                                        @foreach ($patientdata as $data)
                                            <tr>
                                                
                                                <td>{{ $data->id}}</td>
                                                <td>{{ $data->name}}</td>
                                                <td>{{ $data->email}}</td>
                                                <td><img src="{{ asset('uploads/patientfile/'.$data->profilepic) }}" width="70px" height="70px" alt="Image"></td>
                                               
                                               
                                                
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ url('patient-edit/'.$data->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <form action="{{ url('patient-delete/'.$data->id) }}" method="POST">
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
                                    {{ $patientdata->links() }}
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->




            </div> <!-- container-fluid -->
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
$('#search').on('keyup', function(){
    search();
});

function search(){
     var keyword = $('#search').val();
     var _token = $('input[name="_token"]').val();
     $.post('{{ route("patient.search") }}',
      {
         _token: _token,
         keyword:keyword
       },
       function(data){
        table_post_row(data);
          console.log(data);
       });
}
// table row with ajax
function table_post_row(res){
let htmlView = '';
if(res.patients.length <= 0){
    htmlView+= `
       <tr>
          <td colspan="4">No data.</td>
      </tr>`;
}
for(let i = 0; i < res.patients.length; i++){
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    htmlView += `
        <tr>
            <td>`+ (i+1) +`</td>
            <td>`+res.patients[i].name+`</td>
            <td>`+res.patients[i].email+`</td>
            <td><img src="{{ asset('uploads/patientfile/`+res.patients[i].profilepic+`') }}" width="70px" height="70px" alt="Image"></td>
            <td>
                <div class="d-flex gap-3">
                    <a href="{{ url('patient-edit/`+ res.patients[i].id + `') }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                    <form action="{{ url('patient-delete/`+ res.patients[i].id + `') }}" method="POST">
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                    </form>
                </div>
            </td>
        </tr>`;
}
$('tbody').html(htmlView);

     $('tbody').html(htmlView);
}
</script>
</body>

</html>