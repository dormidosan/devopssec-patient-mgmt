<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{route('doctor.dashboard')}}" class="sidebar-brand">
            Pat<span>ie</span>nts
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('patients.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Patients</span>
                </a>
            </li>
            <li class="nav-item nav-category">Management</li>

            <li class="nav-item">
                <a href="{{route('diseases.index')}}" class="nav-link">

                    <span class="link-icon mdi mdi-needle"></span>

                    <span class="link-title">Diseases</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('drugs.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Drugs</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Appointments</span>
                </a>
            </li>
            @include('dashboard.partials.sidebar-component')
        </ul>
    </div>
</nav>
