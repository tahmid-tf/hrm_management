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
                                All Deductions
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
                        <div class="card-header">All Deductions</div>
                        <div class="card-body">


                            <a href="{{ route('deductions.create') }}" class="btn btn-primary mb-4">+ Add Deduction</a>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Month</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($deductions as $deduction)
                                    <tr>
                                        <td>{{ $deduction->employee->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($deduction->month)->format('F Y') }}</td>
                                        <td>{{ $deduction->type }}</td>
                                        <td>{{ number_format($deduction->amount, 2) }}</td>
                                        <td>{{ $deduction->remarks }}</td>
                                        <td>
                                            <form action="{{ route('deductions.destroy', $deduction->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this deduction?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark me-2" title="Delete request">
                                                    <i data-feather="trash-2"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No deductions found.</td>
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

