@if(auth()->user()->hasRole('hr'))

    {{--  ------------------------------------------- Employee Management -------------------------------------------  --}}

    @php
        $isEmployeesActive = request()->routeIs('hr_employee.create') || request()->routeIs('hr_employee.index');
    @endphp

    <a
        class="nav-link {{ $isEmployeesActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseFlows"
        aria-expanded="{{ $isEmployeesActive ? 'true' : 'false' }}"
        aria-controls="collapseFlows"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Employees
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse {{ $isEmployeesActive ? 'show' : '' }}"
        id="collapseFlows"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('hr_employee.create') ? 'active' : '' }}" href="{{ route('hr_employee.create') }}">
                Add Employee
            </a>
            <a class="nav-link {{ request()->routeIs('hr_employee.index') ? 'active' : '' }}" href="{{ route('hr_employee.index') }}">
                View All Employees
            </a>
        </nav>
    </div>


    {{--  ------------------------------------------- Employee Management -------------------------------------------  --}}

    {{--  ------------------------------------------- Task Management -------------------------------------------  --}}

    <!-- Sidenav Link (Charts)-->
    @php
        $isTaskActive = request()->routeIs('kanban.index');
    @endphp

    <a class="nav-link {{ $isTaskActive ? 'active' : '' }}" href="{{ route('kanban.index') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Task Management
    </a>



    {{--  ------------------------------------------- Task Management -------------------------------------------  --}}

    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}

    <!-- Sidenav Link (Charts)-->
    @php
        $isAttendanceActive = request()->routeIs('attendance_list');
    @endphp

    <a class="nav-link {{ $isAttendanceActive ? 'active' : '' }}" href="{{ route('attendance_list') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Attendances
    </a>



    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}

    {{--  ------------------------------------------- Leave Notices -------------------------------------------  --}}

    @php
        $isLeaveActive = request()->routeIs('leave_notices.create') || request()->routeIs('leave_notices.index');
    @endphp

    <a
        class="nav-link {{ $isLeaveActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseLeave"
        aria-expanded="{{ $isLeaveActive ? 'true' : 'false' }}"
        aria-controls="collapseLeave"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Leave Notices
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse {{ $isLeaveActive ? 'show' : '' }}"
        id="collapseLeave"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('leave_notices.create') ? 'active' : '' }}" href="{{ route('leave_notices.create') }}">
                Write Leave Notices
            </a>
            <a class="nav-link {{ request()->routeIs('leave_notices.index') ? 'active' : '' }}" href="{{ route('leave_notices.index') }}">
                View All Notices
            </a>
        </nav>
    </div>


    {{--  ------------------------------------------- Leave Notices -------------------------------------------  --}}

    {{-- ------------ Essential sidebar items ------------ --}}

    <x-sidebar.essential></x-sidebar.essential>

@endif
