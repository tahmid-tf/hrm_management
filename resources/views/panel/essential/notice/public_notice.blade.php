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
                                Company Announcements
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
                        <div class="card-header">Company Announcements</div>
                        <div class="card-body">
                            @forelse($notices as $notice)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <strong>{{ $notice->title }}</strong>
                                        <span class="float-end">{{ $notice->published_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-black">{!! nl2br(e($notice->description)) !!}</p>
                                    </div>
                                </div>
                            @empty
                                <p>No announcements found.</p>
                            @endforelse

                            <div class="d-flex justify-content-center">
                                {{ $notices->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

