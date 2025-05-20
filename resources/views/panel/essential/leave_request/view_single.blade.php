@extends('layouts.template.main')

@section('content')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="file-text"></i>
                                </div>
                                Leave Request Details
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content -->
        <div class="container-xl px-4 mt-4">
            <div class="row">


                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-xl-8 offset-xl-2">
                    <div class="card mb-4 shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Leave Information</span>
                            <span class="badge
                            @if($leave->status == 'Pending') bg-warning
                            @elseif($leave->status == 'Approved') bg-success
                            @else bg-danger @endif">
                            {{ $leave->status }}
                        </span>
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Employee:</strong> {{ $leave->employee->name }} ({{ $leave->employee->email }})
                            </div>
                            <div class="mb-3">
                                <strong>Leave Type:</strong> {{ $leave->leave_type }}
                            </div>
                            <div class="mb-3">
                                <strong>Start
                                    Date:</strong> {{ \Carbon\Carbon::parse($leave->start_date)->toFormattedDateString() }}
                            </div>
                            <div class="mb-3">
                                <strong>End
                                    Date:</strong> {{ \Carbon\Carbon::parse($leave->end_date)->toFormattedDateString() }}
                            </div>
                            <div class="mb-3">
                                <strong>Reason:</strong><br>
                                <p class="text">{{ $leave->reason ?? 'N/A' }}</p>
                            </div>
                            @if ($leave->admin_comment)
                                <div class="mb-3">
                                    <strong>Admin Comment:</strong>
                                    <p class="text-muted">{{ $leave->admin_comment }}</p>
                                </div>
                            @endif

                            @if($leave->status == 'Pending')
                                <hr>
                                <form action="{{ route('leave_notices.update', $leave->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="admin_comment" class="form-label">Comment (optional)</label>
                                        <textarea name="admin_comment" id="admin_comment" rows="3" class="form-control"
                                                  placeholder="Add a comment..."></textarea>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" name="action" value="approve" class="btn btn-success">
                                            Approve
                                        </button>
                                        <button type="submit" name="action" value="reject" class="btn btn-danger">
                                            Reject
                                        </button>
                                    </div>

                                    @if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('employee'))

                                        <div class="d-flex gap-2 pt-2">
                                            <p style="color: red" class="text">* Approvals are only available for Admin
                                                and HR</p>
                                        </div>

                                    @endif


                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
