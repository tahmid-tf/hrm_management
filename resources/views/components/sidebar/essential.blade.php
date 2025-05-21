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
