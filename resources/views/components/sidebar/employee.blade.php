@if(auth()->user()->hasRole('employee'))

    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}

    <!-- Sidenav Link (Charts)-->
    @php
        $isAttendanceEmpActive = request()->routeIs('attendance_list_employee');
    @endphp

    <a class="nav-link {{ $isAttendanceEmpActive ? 'active' : '' }}" href="{{ route('attendance_list_employee') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Attendances
    </a>


    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}

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


    {{--  ------------------------------------------- payrolls -------------------------------------------  --}}

    <!-- Sidenav Link (Charts)-->
    @php
        $isPayrollActive = request()->routeIs('payrolls_data');
    @endphp

    <a class="nav-link {{ $isPayrollActive ? 'active' : '' }}" href="{{ route('payrolls_data') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Payrolls
    </a>


    {{--  ------------------------------------------- payrolls -------------------------------------------  --}}

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
            <a class="nav-link {{ request()->routeIs('leave_notices.create') ? 'active' : '' }}"
               href="{{ route('leave_notices.create') }}">
                Write Leave Notices
            </a>
            <a class="nav-link {{ request()->routeIs('leave_notices.index') ? 'active' : '' }}"
               href="{{ route('leave_notices.index') }}">
                View All Notices
            </a>
        </nav>
    </div>



    {{--  ------------------------------------------- Leave Notices -------------------------------------------  --}}

    {{-- ------------ Essential sidebar items ------------ --}}

    {{--    <x-sidebar.essential></x-sidebar.essential>--}}
@endif
