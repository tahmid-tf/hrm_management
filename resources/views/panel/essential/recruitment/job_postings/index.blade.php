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
                                Job Postings
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
                        <div class="card-header">Job Postings</div>
                        <div class="card-body">

                            <a href="{{ route('job-postings.create') }}" class="btn btn-primary mb-3">Create New Job</a>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Department</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Deadline</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobPostings as $job)
                                    <tr>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->department }}</td>
                                        <td>{{ ucfirst($job->type) }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>
                            <span class="badge {{ $job->status === 'open' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($job->status) }}
                            </span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($job->deadline)->format('Y-m-d') }}</td>


                                        <td>
                                            <a href="{{ route('job-postings.edit', $job->id) }}"
                                               class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                <i data-feather="edit"></i>
                                            </a>

                                            <form action="{{ route('job-postings.destroy', $job->id) }}" method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure to delete this job posting?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </form>
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

