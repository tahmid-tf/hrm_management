{{--  ------------------------------------------- Payroll & Salary Management -------------------------------------------  --}}

<div class="sidenav-menu-heading">Salary Management</div>

{{--  --------------------- Salary Structure ---------------------  --}}


@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hr'))

    @php
        $isStructureActive = request()->routeIs('salary-structure.create') || request()->routeIs('salary-structure.index');
    @endphp

    <a
        class="nav-link {{ $isStructureActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseStructure"
        aria-expanded="{{ $isStructureActive ? 'true' : 'false' }}"
        aria-controls="collapseStructure"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Salary Structure
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse {{ $isStructureActive ? 'show' : '' }}"
        id="collapseStructure"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('salary-structure.create') ? 'active' : '' }}"
               href="{{ route('salary-structure.create') }}">Add/Edit Info</a>
            <a class="nav-link {{ request()->routeIs('salary-structure.index') ? 'active' : '' }}"
               href="{{ route('salary-structure.index') }}">View All</a>
        </nav>
    </div>

    {{--  --------------------- Salary Increment ---------------------  --}}

    @php
        $isIncrementActive = request()->routeIs('salary-increments.create') || request()->routeIs('salary-increments.index');
    @endphp

    <a
        class="nav-link {{ $isIncrementActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseIncrement"
        aria-expanded="{{ $isIncrementActive ? 'true' : 'false' }}"
        aria-controls="collapseIncrement"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Salary Increment
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse {{ $isIncrementActive ? 'show' : '' }}"
        id="collapseIncrement"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('salary-increments.create') ? 'active' : '' }}"
               href="{{ route('salary-increments.create') }}">Add/Edit Info</a>
            <a class="nav-link {{ request()->routeIs('salary-increments.index') ? 'active' : '' }}"
               href="{{ route('salary-increments.index') }}">View All</a>
        </nav>
    </div>



    {{--  --------------------- Salary Deduction ---------------------  --}}

    @php
        $isDeductionActive = request()->routeIs('deductions.create') || request()->routeIs('deductions.index');
    @endphp

    <a
        class="nav-link {{ $isDeductionActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseDeduction"
        aria-expanded="{{ $isDeductionActive ? 'true' : 'false' }}"
        aria-controls="collapseDeduction"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Salary Deduction
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse {{ $isDeductionActive ? 'show' : '' }}"
        id="collapseDeduction"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('deductions.create') ? 'active' : '' }}"
               href="{{ route('deductions.create') }}">Add Info</a>
            <a class="nav-link {{ request()->routeIs('deductions.index') ? 'active' : '' }}"
               href="{{ route('deductions.index') }}">View All</a>
        </nav>
    </div>



    {{--  --------------------- Payroll ---------------------  --}}

    @php
        $isPayrollActive = request()->routeIs('payrolls.create') || request()->routeIs('payrolls.index');
    @endphp

    <a
        class="nav-link {{ $isPayrollActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapsePayroll"
        aria-expanded="{{ $isPayrollActive ? 'true' : 'false' }}"
        aria-controls="collapsePayroll"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Payroll
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>
    <div
        class="collapse {{ $isPayrollActive ? 'show' : '' }}"
        id="collapsePayroll"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('payrolls.create') ? 'active' : '' }}"
               href="{{ route('payrolls.create') }}">Add Info</a>
            <a class="nav-link {{ request()->routeIs('payrolls.index') ? 'active' : '' }}"
               href="{{ route('payrolls.index') }}">View All</a>
        </nav>
    </div>

@endif

{{--  --------------------- Payroll ---------------------  --}}

@if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('employee'))

    @php
        $isPayrollActive = request()->routeIs('payrolls_data');
    @endphp

    <a
        class="nav-link {{ $isPayrollActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapsePayroll"
        aria-expanded="{{ $isPayrollActive ? 'true' : 'false' }}"
        aria-controls="collapsePayroll"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Payroll
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>

    <div
        class="collapse {{ $isPayrollActive ? 'show' : '' }}"
        id="collapsePayroll"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ $isPayrollActive ? 'active' : '' }}"
               href="{{ route('payrolls_data') }}">
                View All
            </a>
        </nav>
    </div>

@endif


{{--  ------------------------------------------- Payroll & Salary Management -------------------------------------------  --}}

{{--  ------------------------------------------- Recruitment Management -------------------------------------------  --}}

@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('user'))

    <div class="sidenav-menu-heading">Recruitment Management</div>

    @php
        $isJobPostingActive = request()->routeIs('job-postings.create') || request()->routeIs('job-postings.index');
    @endphp

    <a
        class="nav-link {{ $isJobPostingActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseJobPosting"
        aria-expanded="{{ $isJobPostingActive ? 'true' : 'false' }}"
        aria-controls="collapseJobPosting"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Job Advertisement
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>

    <div
        class="collapse {{ $isJobPostingActive ? 'show' : '' }}"
        id="collapseJobPosting"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('job-postings.create') ? 'active' : '' }}"
               href="{{ route('job-postings.create') }}">
                Add Jobs
            </a>
            <a class="nav-link {{ request()->routeIs('job-postings.index') ? 'active' : '' }}"
               href="{{ route('job-postings.index') }}">
                View All
            </a>
        </nav>
    </div>



    @php
        $isApplicantsActive = request()->routeIs('applicants.index');
    @endphp

    <a
        class="nav-link {{ $isApplicantsActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseRecruitment"
        aria-expanded="{{ $isApplicantsActive ? 'true' : 'false' }}"
        aria-controls="collapseRecruitment"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Applicants
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>

    <div
        class="collapse {{ $isApplicantsActive ? 'show' : '' }}"
        id="collapseRecruitment"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('applicants.index') ? 'active' : '' }}"
               href="{{ route('applicants.index') }}">
                View All
            </a>
        </nav>
    </div>

@endif


{{--  ------------------------------------------- Recruitment Management -------------------------------------------  --}}

{{--  ------------------------------------------- Expense Management -------------------------------------------  --}}




@if(auth()->user()->hasRole('admin'))
    <div class="sidenav-menu-heading">Expense Management</div>

    @php
        $isExpenseCatActive = request()->routeIs('expense-categories.create') || request()->routeIs('expense-categories.index');
    @endphp

    <a
        class="nav-link {{ $isExpenseCatActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseExpenseCategories"
        aria-expanded="{{ $isExpenseCatActive ? 'true' : 'false' }}"
        aria-controls="collapseExpenseCategories"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Categories
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>

    <div
        class="collapse {{ $isExpenseCatActive ? 'show' : '' }}"
        id="collapseExpenseCategories"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('expense-categories.create') ? 'active' : '' }}"
               href="{{ route('expense-categories.create') }}">
                Add Categories
            </a>
            <a class="nav-link {{ request()->routeIs('expense-categories.index') ? 'active' : '' }}"
               href="{{ route('expense-categories.index') }}">
                View All
            </a>
        </nav>
    </div>

@endif


{{-- ------------------- expense management ------------------- --}}


@if(auth()->user()->hasRole("hr"))

    <div class="sidenav-menu-heading">Expense Management</div>


    @php
        $isExpenseActive = request()->routeIs('expenses.create') || request()->routeIs('expenses.index');
    @endphp

    <a
        class="nav-link {{ $isExpenseActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseExpenseManagement"
        aria-expanded="{{ $isExpenseActive ? 'true' : 'false' }}"
        aria-controls="collapseExpenseManagement"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Expense
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>

    <div
        class="collapse {{ $isExpenseActive ? 'show' : '' }}"
        id="collapseExpenseManagement"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('expenses.create') ? 'active' : '' }}"
               href="{{ route('expenses.create') }}">
                Add Expenses
            </a>
            <a class="nav-link {{ request()->routeIs('expenses.index') ? 'active' : '' }}"
               href="{{ route('expenses.index') }}">
                View All
            </a>
        </nav>
    </div>

@endif



{{--  ------------------------------------------- Expense Management -------------------------------------------  --}}

{{--  ------------------------------------------- Notice Management -------------------------------------------  --}}

@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hr'))

    @php
        $isNoticeActive = request()->routeIs('notices.create') || request()->routeIs('notices.index');
    @endphp

    <div class="sidenav-menu-heading">Notice Management</div>

    <a
        class="nav-link {{ $isNoticeActive ? '' : 'collapsed' }}"
        href="javascript:void(0);"
        data-bs-toggle="collapse"
        data-bs-target="#collapseNotice"
        aria-expanded="{{ $isNoticeActive ? 'true' : 'false' }}"
        aria-controls="collapseNotice"
    >
        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
        Notices
        <div class="sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </a>

    <div
        class="collapse {{ $isNoticeActive ? 'show' : '' }}"
        id="collapseNotice"
        data-bs-parent="#accordionSidenav"
    >
        <nav class="sidenav-menu-nested nav">
            <a class="nav-link {{ request()->routeIs('notices.create') ? 'active' : '' }}"
               href="{{ route('notices.create') }}">
                Add Notices
            </a>
            <a class="nav-link {{ request()->routeIs('notices.index') ? 'active' : '' }}"
               href="{{ route('notices.index') }}">
                View All
            </a>
        </nav>
    </div>
@endif

{{--  ------------------------- Notices for all -------------------------  --}}

@php
    $isAnnouncementActive = request()->routeIs('public_notice_data');
@endphp

<div class="sidenav-menu-heading">Announcements</div>

<a class="nav-link {{ $isAnnouncementActive ? 'active' : '' }}" href="{{ route('public_notice_data') }}">
    <div class="nav-link-icon">
        <i data-feather="bar-chart"></i>
    </div>
    Announcements
</a>


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
