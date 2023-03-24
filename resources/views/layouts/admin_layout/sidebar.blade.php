<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu"></li>

            <li>
                <a href="{{ url('/dashboard') }}">
                    <i data-feather="home"></i>
                    <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                    <span data-key="t-dashboard"></span>
                </a>
            </li>

            <li class="menu-title" data-key="t-apps"> </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="users"></i>
                    <span data-key="t-ecommerce">Clinics/Hospital</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/add-clinic') }}" key="t-products">Add </a></li>
                    <li><a href="{{ url('/list-clinic') }}" data-key="t-product-detail"> List Registrations</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="list"></i>
                    <span data-key="t-ecommerce"> Master </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <!-- <li><a href="{{ url('/add-speciality') }}" key="t-products">Add </a></li> -->
                    <li><a href="{{ url('/list-speciality') }}" data-key="t-product-detail"> Add Speciality</a></li>
                    <li><a href="{{ url('/list-symptom') }}" data-key="t-product-detail"> Add Symptoms</a></li>
                    <li><a href="{{ url('/list-state-city') }}" data-key="t-product-detail"> Add State</a></li>
                    <li><a href="{{ url('/list-city') }}" data-key="t-product-detail"> Add City</a></li>
                    <li><a href="{{ url('/add-appointment-slot') }}" data-key="t-product-detail"> Add Appintment Slots</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="users"></i>
                    <span data-key="t-ecommerce">Doctor Management</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/add-doctor') }}" key="t-products">Add Doctor</a></li>
                    <li><a href="{{ url('/list-doctor') }}" data-key="t-product-detail">List Doctor</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="users"></i>
                    <span data-key="t-ecommerce">Patient Management</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/add-patient') }}" key="t-products">Add Patient</a></li>
                    <li><a href="{{ url('/list-patient') }}" data-key="t-product-detail">List Patients</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="users"></i>
                    <span data-key="t-ecommerce">Appointments</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/add-new-appointment') }}" key="t-products">New </a></li>
                    <li><a href="{{ url('/add-existing-appointment') }}" data-key="t-product-detail">Existing</a></li>
                    <li><a href="{{ url('/list-new-appointment') }}" data-key="t-product-detail">List</a></li>
                    
                </ul>
            </li>

            

        </ul>

        <div class="card sidebar-alert shadow-none text-center mx-4 mb-0 mt-5">
            <div class="card-body">
                <img src="assets/images/giftbox.png" alt="">
                <div class="mt-4">
                    <h5 class="alertcard-title font-size-16"> </h5>
                    <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.
                    </p>
                    <a href="#!" class="btn btn-primary mt-2"> </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
</div>
</div>