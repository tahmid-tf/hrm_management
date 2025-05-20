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
                                View All Leave Requests
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
                        <div class="card-header">View All Leave Requests</div>
                        <div class="card-body">

                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($leaves as $leave)
                                    <tr>
                                        <td>{{ $leave->employee->name ?? '' }}</td>
                                        <td>{{ $leave->employee->email ?? '' }}</td>
                                        <td>{{ $leave->start_date ?? '' }}</td>
                                        <td>{{ $leave->end_date ?? '' }}</td>
                                        <td>{{ $leave->status ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('leave_notices.show', $leave->id) }}"
                                               class="btn btn-datatable btn-icon btn-transparent-dark me-2" title="view request">
                                                <i data-feather="eye" title="view"></i>
                                            </a>
                                        </td>
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
