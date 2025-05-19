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
@endif
