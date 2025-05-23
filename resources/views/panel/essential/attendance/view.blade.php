@extends('layouts.template.main')

@section('content')
    <main>
        <header
            class="page-header page-header-compact page-header-light border-bottom bg-white mb-4"
        >
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div
                        class="row align-items-center justify-content-between pt-3"
                    >
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="user"></i>
                                </div>
                                View All Attendances
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">

            {{-- ----------------------------- attendance grace time setup ----------------------------- --}}

            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hr'))
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Attendance Grace Time</div>
                            <div class="card-body">


                                @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif


                                <form
                                    action="{{ route('attendance_grace_calculation.update', $attendance_grace_time->id) }}"
                                    method="POST" class="mb-4" onsubmit="return confirm('Are you sure you want to update the grace time?')">
                                    @csrf
                                    @method('put')

                                    <div class="card shadow-sm border-0">
                                        <div class="card-body">
                                            <div class="row g-3 align-items-end">

                                                <div class="col-md-4">
                                                    <label for="task-title" class="form-label">Attendance Grace Time
                                                        <span
                                                            class="text-danger">*</span></label>
                                                    <input type="time" name="value" id="task-title" class="form-control"
                                                           placeholder="" required
                                                           value="{{ $attendance_grace_time->value ?? '' }}">
                                                </div>

                                                <div class="col-md-2 text-end">
                                                    <button class="btn btn-primary w-100" type="submit">
                                                        <i data-feather="plus-circle" class="me-1"></i> Update Grace
                                                        Time
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            @endif

            {{-- ----------------------------- attendance grace time setup ----------------------------- --}}

            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
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
            </div>
        </div>
    </main>

@endsection
