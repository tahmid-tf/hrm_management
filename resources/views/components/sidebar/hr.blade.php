@if(auth()->user()->hasRole('hr'))

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
            <a class="nav-link" href="{{ route('hr_employee.create') }}"
            >Add Employee</a
            >
            <a class="nav-link" href="{{ route('hr_employee.index') }}"
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
    <a class="nav-link" href="{{ route('attendance_list') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Attendances
    </a>


    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}

@endif
