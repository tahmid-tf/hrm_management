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
                                Edit Job Posting
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
                        <div class="card-header">Edit Job Posting</div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <form action="{{ route('job-postings.update', $jobPosting->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label>Job Title</label>
                                    <input type="text" name="title" class="form-control"
                                           value="{{ old('title', $jobPosting->title) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Department</label>
                                    <input type="text" name="department" class="form-control"
                                           value="{{ old('department', $jobPosting->department) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Job Type</label>
                                    <select name="type" class="form-control" required>
                                        @foreach(['full-time', 'part-time', 'contract'] as $type)
                                            <option
                                                value="{{ $type }}" {{ old('type', $jobPosting->type) == $type ? 'selected' : '' }}>
                                                {{ ucfirst($type) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control"
                                           value="{{ old('location', $jobPosting->location) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option
                                            value="open" {{ old('status', $jobPosting->status) == 'open' ? 'selected' : '' }}>
                                            Open
                                        </option>
                                        <option
                                            value="closed" {{ old('status', $jobPosting->status) == 'closed' ? 'selected' : '' }}>
                                            Closed
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Deadline</label>
                                    <input type="date" name="deadline" class="form-control"
                                           value="{{ old('deadline', $jobPosting->deadline) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Job Description</label>
                                    <textarea name="description" class="form-control" rows="5"
                                              required>{{ old('description', $jobPosting->description) }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Job</button>
                                <a href="{{ route('job-postings.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

