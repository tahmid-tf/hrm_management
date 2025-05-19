@if(auth()->user()->hasRole('admin'))

    {{--  ------------------------------------------- Employee Management -------------------------------------------  --}}

    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseFlows"
        aria-expanded="false"
        aria-controls="collapseFlows"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Employees
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseFlows"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('employee.create') }}"
            >Add Employee</a
            >
            <a class="nav-link" href="{{ route('employee.index') }}"
            >View All Employees</a
            >
        </nav>
    </div>


    {{--  ------------------------------------------- Employee Management -------------------------------------------  --}}

    {{--  ------------------------------------------- Task Management -------------------------------------------  --}}

    <!-- Sidenav Link (Charts)-->
    <a class="nav-link" href="{{ route('kanban.index') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Task Management
    </a>


    {{--  ------------------------------------------- Task Management -------------------------------------------  --}}


    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}

    <!-- Sidenav Link (Charts)-->
    <a class="nav-link" href="{{ route('attendance_list_admin') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Attendances
    </a>


    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}


    {{--  ------------------------------------------- Leave Notices -------------------------------------------  --}}

    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseLeave"
        aria-expanded="false"
        aria-controls="collapseLeave"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Leave Notices
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseLeave"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('leave_notices.create') }}"
            >Write Leave Notices</a
            >
            <a class="nav-link" href="{{ route('leave_notices.index') }}"
            >View All Notices</a
            >
        </nav>
    </div>


    {{--  ------------------------------------------- Leave Notices -------------------------------------------  --}}

@endif
