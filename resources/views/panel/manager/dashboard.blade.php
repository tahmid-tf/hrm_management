@extends('layouts.template.main')

@section('content')
    <main>
        <header
            class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10"
        >
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="activity"></i>
                                </div>
                                Dashboard
                            </h1>
                            <div class="page-header-subtitle">
                                A concise summary of key metrics, trends, and essential HR management insights
                            </div>
                        </div>

                        {{--                        <div class="col-12 col-xl-auto mt-4">--}}
                        {{--                            <div--}}
                        {{--                                class="input-group input-group-joined border-0"--}}
                        {{--                                style="width: 16.5rem"--}}
                        {{--                            >--}}
                        {{--                      <span class="input-group-text"--}}
                        {{--                      ><i class="text-primary" data-feather="calendar"></i--}}
                        {{--                          ></span>--}}
                        {{--                                <input--}}
                        {{--                                    class="form-control ps-0 pointer"--}}
                        {{--                                    id="litepickerRangePlugin"--}}
                        {{--                                    placeholder="Select date range..."--}}
                        {{--                                />--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body h-100 p-5">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-xxl-12">
                                    <div
                                        class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4"
                                    >
                                        <h1 class="text-primary">Welcome to Your HR Management Dashboard!</h1>
                                        <p class="text-gray-700 mb-0">
                                            Effortlessly manage employees, streamline workflows, and optimize HR
                                            operations with our powerful tools and resources.
                                        </p>
                                    </div>
                                </div>
                                {{--                                <div class="col-xl-4 col-xxl-12 text-center">--}}
                                {{--                                    <img--}}
                                {{--                                        class="img-fluid"--}}
                                {{--                                        src="{{ asset('assets/img/illustrations/at-work.svg') }}"--}}
                                {{--                                        style="max-width: 26rem"--}}
                                {{--                                    />--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- -------------------- Announcements -------------------- --}}

                <div class="col-xxl-8 col-xl-12 mb-4">
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Announcements
                        </div>

                        <div class="card-body">
                            <div class="timeline timeline-xs">

                                @foreach($notices as $announcement)

                                    <!-- Timeline Item 1-->
                                    <div class="timeline-item">
                                        <div class="timeline-item-marker">
                                            <div
                                                class="timeline-item-marker-text">{{ $announcement->created_at->diffForHumans() }}</div>
                                            <div
                                                class="timeline-item-marker-indicator bg-green"
                                            ></div>
                                        </div>
                                        <div class="timeline-item-content">
                                            <a class="fw-bold text-dark"
                                               href="{{ route('notices.index') }}">{{ $announcement->title }} -</a>
                                            {{ \Illuminate\Support\Str::limit($announcement->description,200,'...') }}
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Example Colored Cards for Dashboard Demo-->
            <div class="row">


                {{-- ----------------------------- Employees ----------------------------- --}}

                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="me-3">
                                    <div class="text-lg small">
                                        Employees
                                    </div>
                                    <div class="text-lg fw-bold"></div>
                                </div>
                                {{--                                <i--}}
                                {{--                                    class="feather-xl text-white-50"--}}
                                {{--                                    data-feather="calendar"--}}
                                {{--                                ></i>--}}
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex align-items-center justify-content-between small"
                        >
                            <a class="text-white stretched-link" href="{{ route('manager_views_employees') }}"
                            >View Employees</a
                            >
                            <div class="text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ----------------------------- Payrolls ----------------------------- --}}

                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card bg-indigo text-white h-100">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="me-3">
                                    <div class="text-lg small">
                                        Payrolls
                                    </div>
                                    <div class="text-lg fw-bold"></div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex align-items-center justify-content-between small"
                        >
                            <a class="text-white stretched-link" href="{{ route('payrolls_data') }}"
                            >View Payrolls</a
                            >
                            <div class="text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ----------------------------- Leave Notices ----------------------------- --}}

                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="me-3">
                                    <div class="text-lg small">
                                        Leave Notices
                                    </div>
                                    <div class="text-lg fw-bold"></div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex align-items-center justify-content-between small"
                        >
                            <a class="text-white stretched-link" href="{{ route('leave_notices.index') }}"
                            >View Leave Notices</a
                            >
                            <div class="text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ----------------------------- Announcements ----------------------------- --}}

                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="me-3">
                                    <div class="text-lg small">
                                        Announcements
                                    </div>
                                    <div class="text-lg fw-bold"></div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex align-items-center justify-content-between small"
                        >
                            <a class="text-white stretched-link" href="{{ route('public_notice_data') }}"
                            >View Announcements</a
                            >
                            <div class="text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Example Charts for Dashboard Demo-->
            <div class="row">


                {{-- ------------------------- Salary Breakdown ------------------------- --}}

                <div class="col-xl-6 mb-4">
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Payrolls Breakdown
                            <div class="dropdown no-caret">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas
                                    id="myAreaChart"
                                    width="100%"
                                    height="30"
                                ></canvas>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ------------------------- Salary Breakdown ------------------------- --}}

                {{-- ------------------------- Expenses Breakdown ------------------------- --}}

                <div class="col-xl-6 mb-4">
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Expenses Breakdown
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="myBarChart" width="100%" height="30"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- ------------------------- Expenses Breakdown ------------------------- --}}


            </div>

            {{-- ------------------------- Attendaces Data ------------------------- --}}

            <div class="card mb-4">
                <div class="card-header">View All Attendances</div>
                <div class="card-body">

                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Checked in</th>
                            <th>Checked out</th>
                            <th>Status</th>
                            <th>Working Hours</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->employee->name ?? '' }}</td>
                                <td>{{ $attendance->employee->email ?? '' }}</td>
                                <td>{{ $attendance->date ?? '' }}</td>
                                <td>
                                    {{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('h:i A') : '' }}
                                </td>
                                <td>
                                    {{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('h:i A') : '' }}
                                </td>
                                <td>{{ $attendance->status ?? '' }}</td>


                                {{-- -------------------------- Natural hour to minuite convertion -------------------------- --}}

                                <td>
                                    @php
                                        $hours = floor($attendance->working_hours);
                                        $minutes = round(($attendance->working_hours - $hours) * 60);

                                        $parts = [];

                                        if ($hours > 0) {
                                            $parts[] = $hours . ' ' . ($hours === 1 ? 'hr' : 'hrs');
                                        }

                                        if ($minutes > 0) {
                                            $parts[] = $minutes . ' ' . ($minutes === 1 ? 'min' : 'mins');
                                        }

                                        $formattedTime = count($parts) ? implode(' ', $parts) : '0 min';
                                    @endphp

                                    {{ $formattedTime }}
                                </td>


                                {{-- -------------------------- Natural hour to minuite convertion -------------------------- --}}

                                @if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('employee'))
                                    <td></td>

                                @else

                                    <td>
                                        <a href="{{ route('attendance_edit', $attendance->id) }}"
                                           class="btn btn-datatable btn-icon btn-transparent-dark" title="Edit">
                                            <i data-feather="edit"></i>
                                        </a>
                                    </td>

                                @endif


                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </main>
@endsection
