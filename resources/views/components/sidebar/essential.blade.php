{{--  ------------------------------------------- Payroll & Salary Management -------------------------------------------  --}}

<div class="sidenav-menu-heading">Payroll & Salary Management</div>

{{--  --------------------- Salary Structure ---------------------  --}}


@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hr'))

    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseStructure"
        aria-expanded="false"
        aria-controls="collapseStructure"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Salary Structure
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseStructure"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('salary-structure.create') }}">Add/Edit Info</a>
            <a class="nav-link" href="{{ route('salary-structure.index') }}">View All</a>
        </nav>
    </div>

    {{--  --------------------- Salary Increment ---------------------  --}}

    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseIncrement"
        aria-expanded="false"
        aria-controls="collapseIncrement"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Salary Increment
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseIncrement"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('salary-increments.create') }}">Add/Edit Info</a>
            <a class="nav-link" href="{{ route('salary-increments.index') }}">View All</a>
        </nav>
    </div>


    {{--  --------------------- Salary Deduction ---------------------  --}}

    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseDeduction"
        aria-expanded="false"
        aria-controls="collapseDeduction"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Salary Deduction
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseDeduction"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('deductions.create') }}">Add Info</a>
            <a class="nav-link" href="{{ route('deductions.store') }}">View All</a>
        </nav>
    </div>


    {{--  --------------------- Payroll ---------------------  --}}

    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapsePayroll"
        aria-expanded="false"
        aria-controls="collapsePayroll"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Payroll
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapsePayroll"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('payrolls.create') }}">Add Info</a>
            <a class="nav-link" href="{{ route('payrolls.index') }}">View All</a>
        </nav>
    </div>

@endif

{{--  --------------------- Payroll ---------------------  --}}

@if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('employee'))

    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapsePayroll"
        aria-expanded="false"
        aria-controls="collapsePayroll"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Payroll
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapsePayroll"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('payrolls_data') }}">View All</a>
        </nav>
    </div>

@endif


{{--  ------------------------------------------- Payroll & Salary Management -------------------------------------------  --}}


{{--  ------------------------------------------- Export -------------------------------------------  --}}

<div class="sidenav-menu-heading">Export Data</div>

<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseExport"
    aria-expanded="false"
    aria-controls="collapseExport"
>
    <div class="nav-link-icon"><i data-feather="repeat"></i></div>
    Export
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseExport"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">

        <a class="nav-link" href="{{ route('attendance_list_export') }}">Attendance Data Export</a>

        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hr'))
            <a class="nav-link" href="{{ route('payrolls.export') }}">Payrolls Data Export</a>
        @endif
    </nav>
</div>


{{--  ------------------------------------------- Export -------------------------------------------  --}}
