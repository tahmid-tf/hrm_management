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
                                View Applicants
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content -->
        <div class="container-xl px-4 mt-4">
            <div class="row">

                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">View Applicants</div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Post Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Resume</th>
                                    <th>Applied on</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($applicants as $index => $applicant)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $applicant->jobPosting->title }}</td>
                                        <td>{{ $applicant->jobPosting->created_at->format('d-m-y') }}</td>
                                        <td>{{ $applicant->name }}</td>
                                        <td>{{ $applicant->email }}</td>
                                        <td>{{ $applicant->phone ?? 'N/A' }}</td>
                                        <td>
                            <span class="badge
                                @if($applicant->status == 'applied') bg-secondary
                                @elseif($applicant->status == 'shortlisted') bg-primary
                                @elseif($applicant->status == 'rejected') bg-danger
                                @elseif($applicant->status == 'hired') bg-success
                                @endif">
                                {{ ucfirst($applicant->status) }}
                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ asset('storage/' . $applicant->resume) }}" target="_blank"
                                               class="btn btn-sm btn-outline-dark">
                                                View Resume
                                            </a>
                                        </td>
                                        <td>{{ $applicant->created_at->format('d-m-y') }}</td>
                                        <td>
                                            <a href="{{ route('applicants.show', $applicant->id) }}"
                                               class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No applicants found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

