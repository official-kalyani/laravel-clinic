@include('layouts.admin_layout.head-main')

<head>

    <title> | Dason - Admin & Dashboard Template</title>

    @include('layouts.admin_layout.head')

    @include('layouts.admin_layout.head-style')
<style>
    /* #dates {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
      }
      
      #dates li {
        margin-right: 10px;
      }
      #dates li a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      }

      #dates li a:hover {
        background-color: #0069d9;
      } */
      #dates {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
      }
      
      #dates li {
        margin-right: 10px;
      }

      #dates li a {
        display: inline-block;
        padding: 3px 7px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        font-size: 16px;
      }
      .consult{
        display: inline-block;
        padding: 3px 7px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        font-size: 16px;
      }
      .consult:hover{
        display: inline-block;
        padding: 3px 7px;
        background-color: #80addd;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        font-size: 16px;
      }
      #dates li a:hover {
        background-color: #0069d9;
      }

      /* Additional styles to adjust size and spacing */
      #dates li:first-child a {
        margin-left: 0;
      }

      #dates li:last-child a {
        margin-right: 0;
      }

      #dates li:not(:last-child) a {
        margin-right: 10px;
      }
      .activex{
        background-color: grey !important;

      }
      #show-all-button{
        background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    font-size: 16px;
    border:#007bff;
      }
      
</style>
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
                $title = "Appointment List";
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
                                            <div class="wrapper">
                                                <ul id="dates"></ul>
                                            </div>
                                        
                                        <script>
                                            var today = new Date();
                                            var datesList = document.getElementById("dates");  
                                            var selectedDate = getSelectedDate(); 
                                            // Loop through the next 5 days and create clickable links for each date
                                            for (var i = 0; i < 5; i++) {
                                                var date = new Date(today);
                                                date.setDate(today.getDate() + i);
                                                if (i == 0) {
                                                    var dateString = "Today";
                                                    var day = ("0" + date.getDate()).slice(-2);
                                                    var month = ("0" + (date.getMonth() + 1)).slice(-2);
                                                    dateS = day + "-" + month + "-" + date.getFullYear();
                                                    var url = "{{ url('list-new-appointment') }}?date=" + encodeURIComponent(dateS);
                                                    // var url = "{{ url('list-new-appointment') }}";
                                                } else {
                                                    var day = ("0" + date.getDate()).slice(-2);
                                                    var month = ("0" + (date.getMonth() + 1)).slice(-2);
                                                    var year = date.getFullYear().toString().substr(-2);
                                                    dateString = day + "-" + month + "-" + date.getFullYear();
                                                    var url = "{{ url('list-new-appointment') }}?date=" + encodeURIComponent(dateString);
                                                }
                                                var encodedDate = encodeURIComponent(dateString);
                                                url = url.replace(':date', encodedDate);
                                                var link = document.createElement("a");
                                                link.href = url;
                                                link.textContent = dateString;

                                                // If the link's date matches the selected date, add the active class
                                                if (selectedDate === dateString || selectedDate === dateS) {
                                                    link.classList.add("activex");
                                                }
                                                var listItem = document.createElement("li");
                                                listItem.appendChild(link);
                                                datesList.appendChild(listItem);
                                            }
                                            // Create a new button element
                                                var showAllButton = document.createElement("button");
                                                showAllButton.textContent = "Show All";
                                                // Add an ID to the button to make it easy to select
                                                showAllButton.id = "show-all-button";
                                                // Add an event listener to the button to handle clicks
                                                showAllButton.addEventListener("click", function() {
                                                    // Navigate to the list-new-appointment page
                                                    window.location.href = "{{ url('list-new-appointment') }}";
                                                    showAllButton.classList.add("activex");
                                                });

                                                // Append the button to the datesList element
                                                datesList.appendChild(showAllButton);

                                                function getSelectedDate() {
                                                    // Get the value of the 'date' URL parameter
                                                    var urlParams = new URLSearchParams(window.location.search);
                                                    var selectedDate = urlParams.get('date');

                                                    // If the 'date' URL parameter is not set, default to the first date
                                                    if (!selectedDate) {
                                                        var today = new Date();
                                                        var day = ("0" + today.getDate()).slice(-2);
                                                        var month = ("0" + (today.getMonth() + 1)).slice(-2);
                                                        selectedDate = day + "-" + month + "-" + today.getFullYear();
                                                    }

                                                    return selectedDate;
                                                }
                                        </script>
                                        
                                            
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
                                                <th class="align-middle">Patient Name</th>
                                                <th class="align-middle">Appointment Date</th>
                                                <th class="align-middle">Slot Time</th>
                                                <!-- <th class="align-middle">Profile picture</th> -->
                                                
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($appointmentdata) > 0)                                           
                                        @foreach ($appointmentdata as $data)
                                            <tr>
                                                
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->doctorname->name }}</td>
                                                <td>{{ $data->hospitaldata->institute_name }}</td>
                                                <td>{{ $data->patientdata->name }}</td>
                                                <td>{{ $data->appoint_date }}</td>
                                                <td>{{ $data->slot_time }}</td>
                                                
                                               
                                               
                                                
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ url('appointment-edit/'.$data->patient_id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="{{ url('add_consultation/'.$data->patient_id) }}" class="consult">Start Consultation</a>
                                                        <form action="{{ url('appointment-delete/'.$data->id) }}" method="POST">
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
                                               <td colspan="7" style="text-align: center;">No record found</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    {{ $appointmentdata->links() }}
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
}
</script>
</body>

</html>