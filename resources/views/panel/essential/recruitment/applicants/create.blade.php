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
                                Apply for job
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
                        <div class="card-header">Apply for job</div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success mt-2">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('applicants.store') }}" method="POST" enctype="multipart/form-data"
                                  class="mt-4">
                                @csrf

                                <div class="mb-3">
                                    <label for="job_posting_id" class="form-label">Select Job</label>
                                    <select name="job_posting_id" id="job_posting_id" class="form-select" required>
                                        <option value="">-- Select a Job --</option>
                                        @foreach($jobs as $job)
                                            <option value="{{ $job->id }}">{{ $job->title }} ({{ $job->location }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('job_posting_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" required>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone (optional)</label>
                                    <input type="text" name="phone" class="form-control">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="resume" class="form-label">Upload Resume (PDF, DOC, DOCX)</label>
                                    <input type="file" name="resume" class="form-control" required>
                                    @error('resume') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit Application</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

