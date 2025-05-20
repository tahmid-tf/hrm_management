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
                                Request For Leave
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
                        <div class="card-header">Request For Leave</div>
                        <div class="card-body">


                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('leave_notices.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Leave Type</label>
                                    <select name="leave_type" class="form-select" required>
                                        <option value="Sick">Sick</option>
                                        <option value="Casual">Casual</option>
                                        <option value="Annual">Annual</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Reason</label>
                                    <textarea name="reason" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit Leave Request</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
