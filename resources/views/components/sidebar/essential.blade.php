{{--  ------------------------------------------- Payroll & Salary Management -------------------------------------------  --}}

<div class="sidenav-menu-heading">Salary Management</div>

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

{{--  ------------------------------------------- Recruitment Management -------------------------------------------  --}}

@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('user'))

    <div class="sidenav-menu-heading">Recruitment Management</div>

    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseJobPosting"
        aria-expanded="false"
        aria-controls="collapseJobPosting"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Job Advertisement
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseJobPosting"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('job-postings.create') }}">Add Jobs</a>
            <a class="nav-link" href="{{ route('job-postings.index') }}">View All</a>
        </nav>
    </div>


    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseRecruitment"
        aria-expanded="false"
        aria-controls="collapseRecruitment"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Applicants
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseRecruitment"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            {{--            <a class="nav-link" href="{{ route('applicants.create') }}">Add Jobs</a>--}}
            <a class="nav-link" href="{{ route('applicants.index') }}">View All</a>
        </nav>
    </div>

@endif


{{--  ------------------------------------------- Recruitment Management -------------------------------------------  --}}

{{--  ------------------------------------------- Expense Management -------------------------------------------  --}}


<div class="sidenav-menu-heading">Expense Management</div>


@if(auth()->user()->hasRole('admin'))
    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseExpenseCategories"
        aria-expanded="false"
        aria-controls="collapseExpenseCategories"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Categories
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseExpenseCategories"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="">Add Categories</a>
            <a class="nav-link" href="">View All</a>
        </nav>
    </div>
@endif


<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseExpenseManagement"
    aria-expanded="false"
    aria-controls="collapseExpenseManagement"
>
    <div class="nav-link-icon"><i data-feather="repeat"></i></div>
    Expense
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseExpenseManagement"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('expenses.create') }}">Add Expenses</a>
        <a class="nav-link" href="{{ route('expenses.index') }}">View All</a>
    </nav>
</div>


{{--  ------------------------------------------- Expense Management -------------------------------------------  --}}

{{--  ------------------------------------------- Notice Management -------------------------------------------  --}}

<div class="sidenav-menu-heading">Notice Management</div>


@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hr'))
    <a
        class="nav-link collapsed"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseNotice"
        aria-expanded="false"
        aria-controls="collapseNotice"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Notices
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse"
        id="collapseNotice"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('notices.create') }}">Add Notices</a>
            <a class="nav-link" href="{{ route('notices.index') }}">View All</a>
        </nav>
    </div>
@endif


{{--  ------------------------------------------- Notice Management -------------------------------------------  --}}

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

        <a class="nav-link" href="{{ route('attendance_list_export') }}">Attendance Export</a>

        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hr'))
            <a class="nav-link" href="{{ route('payrolls.export') }}">Payrolls Export</a>
            <a class="nav-link" href="{{ route('applicants.export') }}">Applicants Export</a>
            <a class="nav-link" href="{{ route('expenses.export') }}">Expense Export</a>
        @endif
    </nav>
</div>

{{--  ------------------------------------------- Export -------------------------------------------  --}}
