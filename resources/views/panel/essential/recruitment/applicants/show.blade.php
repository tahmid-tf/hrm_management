@extends('layouts.template.main')

@section('content')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Applicant Profile
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content -->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span><i data-feather="file-text" class="me-2"></i>Applicant Details</span>
                            <a href="{{ route('applicants.index') }}" class="btn btn-sm btn-outline-secondary">
                                <i data-feather="arrow-left" class="me-1"></i>Back to List
                            </a>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item">
                                    <strong><i data-feather="user" class="me-1 text-primary"></i>Name:</strong>
                                    {{ $applicant->name }}
                                </li>

                                <li class="list-group-item">
                                    <strong><i data-feather="mail" class="me-1 text-primary"></i>Email:</strong>
                                    {{ $applicant->email }}
                                </li>

                                <li class="list-group-item">
                                    <strong><i data-feather="phone" class="me-1 text-primary"></i>Phone:</strong>
                                    {{ $applicant->phone ?? 'N/A' }}
                                </li>

                                <li class="list-group-item">
                                    <strong><i data-feather="briefcase" class="me-1 text-primary"></i>Job Title:</strong>
                                    {{ optional($applicant->jobPosting)->title ?? 'Deleted Job' }}
                                </li>

                                <li class="list-group-item">
                                    <strong><i data-feather="info" class="me-1 text-primary"></i>Status:</strong>
                                    <span class="badge
                                    @if($applicant->status == 'applied') bg-secondary
                                    @elseif($applicant->status == 'shortlisted') bg-primary
                                    @elseif($applicant->status == 'rejected') bg-danger
                                    @elseif($applicant->status == 'hired') bg-success
                                    @endif">
                                    {{ ucfirst($applicant->status) }}
                                </span>
                                </li>

                                <li class="list-group-item">
                                    <strong><i data-feather="file" class="me-1 text-primary"></i>Resume:</strong><br>
                                    <a href="{{ asset('storage/' . $applicant->resume) }}" target="_blank" class="btn btn-outline-dark btn-sm mt-1">
                                        <i data-feather="download" class="me-1"></i>View Resume
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
