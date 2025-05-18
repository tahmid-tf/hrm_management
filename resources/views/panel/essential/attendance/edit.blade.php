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
            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Edit Attendance Data</div>
                        <div class="card-body">

                            <form action="{{ route('attendance_update', $attendance->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="check_in_time" class="form-label">Check In Time</label>
                                    <input type="time" name="check_in_time" class="form-control" value="{{ old('check_in_time', $attendance->check_in_time) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="check_out_time" class="form-label">Check Out Time</label>
                                    <input type="time" name="check_out_time" class="form-control" value="{{ old('check_out_time', $attendance->check_out_time) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="present" {{ old('status', $attendance->status) == 'present' ? 'selected' : '' }}>Present</option>
                                        <option value="absent" {{ old('status', $attendance->status) == 'absent' ? 'selected' : '' }}>Absent</option>
                                        <option value="late" {{ old('status', $attendance->status) == 'late' ? 'selected' : '' }}>Late</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="working_hours" class="form-label">Working Hours</label>
                                    <input type="number" name="working_hours" class="form-control" step="0.01" value="{{ old('working_hours', $attendance->working_hours) }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Attendance</button>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
