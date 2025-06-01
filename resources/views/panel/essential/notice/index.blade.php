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
                                Notices
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
                        <div class="card-header">Notices</div>
                        <div class="card-body">
                            <a href="{{ route('notices.create') }}" class="btn btn-primary mb-3">Create New Notice</a>
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Visible To</th>
                                    <th>Published At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notices as $notice)
                                    <tr>
                                        <td>{{ $notice->title }}</td>
                                        <td>{{ ucfirst($notice->status) }}</td>
                                        <td>{{ implode(', ',  json_decode($notice->visible_to_roles) ?? []) }}</td>
                                        <td>{{ $notice->published_at->format('d-m-y') }}</td>
                                        <td>
                                            <a href="{{ route('notices.edit', $notice) }}"
                                               class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('notices.destroy', $notice) }}" method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                            <a href="{{ route('notices.show', $notice) }}" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

{{--                            {{ $notices->links() }}--}}

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

