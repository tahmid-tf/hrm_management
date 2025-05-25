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
                                Salary Increments
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
                        <div class="card-header">Salary Increments</div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Increment Amount</th>
                                    <th>Effective Date</th>
                                    <th>Reason</th>
                                    <th>Added By</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($increments as $increment)
                                    <tr>
                                        <td>{{ $increment->employee->name }}</td>
                                        <td>{{ number_format($increment->increment_amount, 2) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($increment->effective_date)->format('d M Y') }}</td>
                                        <td>{{ $increment->reason ?? 'N/A' }}</td>
                                        <td>{{ $increment->addedBy->name }}</td>
                                        <td>
                                            <a href="{{ route('salary-increments.edit', $increment->id) }}"
                                               class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <!-- Optionally delete -->
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

