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
                                Example dashboard overview and content summary
                            </div>
                        </div>

                        <div class="col-12 col-xl-auto mt-4">
                            <div
                                class="input-group input-group-joined border-0"
                                style="width: 16.5rem"
                            >
                      <span class="input-group-text"
                      ><i class="text-primary" data-feather="calendar"></i
                          ></span>
                                <input
                                    class="form-control ps-0 pointer"
                                    id="litepickerRangePlugin"
                                    placeholder="Select date range..."
                                />
                            </div>
                        </div>
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
                                        <h1 class="text-primary">Welcome to Dashboard!</h1>
                                        <p class="text-gray-700 mb-0">
                                            Browse our fully designed UI toolkit! Browse our
                                            prebuilt app pages, components, and utilites, and be
                                            sure to look at our full documentation!
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-12 text-center">
                                    <img
                                        class="img-fluid"
                                        src="{{ asset('assets/img/illustrations/at-work.svg') }}"
                                        style="max-width: 26rem"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- -------------------- Announcements -------------------- --}}

                <div class="col-xxl-8 col-xl-12 mb-4">
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Announcements
                            <div class="dropdown no-caret">

                                {{--                                <button--}}
                                {{--                                    class="btn btn-transparent-dark btn-icon dropdown-toggle"--}}
                                {{--                                    id="dropdownMenuButton"--}}
                                {{--                                    type="button"--}}
                                {{--                                    data-bs-toggle="dropdown"--}}
                                {{--                                    aria-haspopup="true"--}}
                                {{--                                    aria-expanded="false"--}}
                                {{--                                >--}}
                                {{--                                    <i--}}
                                {{--                                        class="text-gray-500"--}}
                                {{--                                        data-feather="more-vertical"--}}
                                {{--                                    ></i>--}}
                                {{--                                </button>--}}

                                {{--                                <div--}}
                                {{--                                    class="dropdown-menu dropdown-menu-end animated--fade-in-up"--}}
                                {{--                                    aria-labelledby="dropdownMenuButton"--}}
                                {{--                                >--}}
                                {{--                                    <h6 class="dropdown-header">Filter Activity:</h6>--}}
                                {{--                                    <a class="dropdown-item" href="#!"--}}
                                {{--                                    ><span class="badge bg-green-soft text-green my-1"--}}
                                {{--                                        >Commerce</span--}}
                                {{--                                        ></a--}}
                                {{--                                    >--}}
                                {{--                                    <a class="dropdown-item" href="#!"--}}
                                {{--                                    ><span class="badge bg-blue-soft text-blue my-1"--}}
                                {{--                                        >Reporting</span--}}
                                {{--                                        ></a--}}
                                {{--                                    >--}}
                                {{--                                    <a class="dropdown-item" href="#!"--}}
                                {{--                                    ><span class="badge bg-yellow-soft text-yellow my-1"--}}
                                {{--                                        >Server</span--}}
                                {{--                                        ></a--}}
                                {{--                                    >--}}
                                {{--                                    <a class="dropdown-item" href="#!"--}}
                                {{--                                    ><span class="badge bg-purple-soft text-purple my-1"--}}
                                {{--                                        >Users</span--}}
                                {{--                                        ></a--}}
                                {{--                                    >--}}
                                {{--                                </div>--}}
                            </div>
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
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="me-3">
                                    <div class="text-white-75 small">
                                        Earnings (Monthly)
                                    </div>
                                    <div class="text-lg fw-bold">$40,000</div>
                                </div>
                                <i
                                    class="feather-xl text-white-50"
                                    data-feather="calendar"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex align-items-center justify-content-between small"
                        >
                            <a class="text-white stretched-link" href="#!"
                            >View Report</a
                            >
                            <div class="text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="me-3">
                                    <div class="text-white-75 small">Earnings (Annual)</div>
                                    <div class="text-lg fw-bold">$215,000</div>
                                </div>
                                <i
                                    class="feather-xl text-white-50"
                                    data-feather="dollar-sign"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex align-items-center justify-content-between small"
                        >
                            <a class="text-white stretched-link" href="#!"
                            >View Report</a
                            >
                            <div class="text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="me-3">
                                    <div class="text-white-75 small">Task Completion</div>
                                    <div class="text-lg fw-bold">24</div>
                                </div>
                                <i
                                    class="feather-xl text-white-50"
                                    data-feather="check-square"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex align-items-center justify-content-between small"
                        >
                            <a class="text-white stretched-link" href="#!"
                            >View Tasks</a
                            >
                            <div class="text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card bg-danger text-white h-100">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="me-3">
                                    <div class="text-white-75 small">Pending Requests</div>
                                    <div class="text-lg fw-bold">17</div>
                                </div>
                                <i
                                    class="feather-xl text-white-50"
                                    data-feather="message-circle"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="card-footer d-flex align-items-center justify-content-between small"
                        >
                            <a class="text-white stretched-link" href="#!"
                            >View Requests</a
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
                            Salary Breakdown
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
