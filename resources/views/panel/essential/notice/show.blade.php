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
                                View Individual Notice
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
                        <div class="card-header">View Individual Notice</div>
                        <div class="card-body">
                            <h2>{{ $notice->title }}</h2>

                            <p><strong>Status:</strong> {{ ucfirst($notice->status) }}</p>
                            <p><strong>Visible To:</strong> {{ implode(', ', json_decode($notice->visible_to_roles) ?? []) }}</p>
                            <p><strong>Published At:</strong> {{ $notice->published_at }}</p>

                            <hr>
                            <p>{!! nl2br(e($notice->description)) !!}</p>

                            <a href="{{ route('notices.index') }}" class="btn btn-secondary mt-3">Back to list</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

