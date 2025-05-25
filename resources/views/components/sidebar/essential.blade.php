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

@endif

{{--  ------------------------------------------- Payroll & Salary Management -------------------------------------------  --}}


{{--  ------------------------------------------- Export -------------------------------------------  --}}

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

        <a class="nav-link" href="{{ route('attendance_list_export') }}"
        >Attendance Data Export</a
        >
    </nav>
</div>


{{--  ------------------------------------------- Export -------------------------------------------  --}}
