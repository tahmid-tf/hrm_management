@if(auth()->user()->hasRole('employee'))

    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}

    <!-- Sidenav Link (Charts)-->
    <a class="nav-link" href="{{ route('attendance_list_employee') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Attendances
    </a>

    {{--  ------------------------------------------- Attendances -------------------------------------------  --}}

    {{--  ------------------------------------------- Task Management -------------------------------------------  --}}

    <!-- Sidenav Link (Charts)-->
    <a class="nav-link" href="{{ route('kanban.index') }}">
        <div class="nav-link-icon">
            <i data-feather="bar-chart"></i>
        </div>
        Task Management
    </a>


    {{--  ------------------------------------------- Task Management -------------------------------------------  --}}

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

    {{-- ------------ Essential sidebar items ------------ --}}

    {{--    <x-sidebar.essential></x-sidebar.essential>--}}
@endif
