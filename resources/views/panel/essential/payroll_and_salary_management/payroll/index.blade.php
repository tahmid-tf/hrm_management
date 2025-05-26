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
                                Payroll List
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
                        <div class="card-header">Payroll List</div>
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-3">Process Payroll</a>


                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Month</th>
                                    <th>Basic Salary</th>
                                    <th>Allowances</th>
                                    <th>Deductions</th>
                                    <th>Net Salary</th>
                                    <th>Status</th>
                                    <th>Processed By</th>
                                    <th>Processed At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payrolls as $payroll)
                                    <tr>
                                        <td>{{ $payroll->employee->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($payroll->month)->format('F Y') }}</td>
                                        <td>{{ number_format($payroll->basic_salary, 2) }}</td>
                                        <td>{{ number_format($payroll->allowances, 2) }}</td>
                                        <td>{{ number_format($payroll->deductions, 2) }}</td>
                                        <td><strong>{{ number_format($payroll->net_salary, 2) }}</strong></td>
                                        <td>{{ $payroll->status }}</td>
                                        <td>{{ $payroll->processor->name ?? 'N/A' }}</td>
                                        <td>{{ $payroll->created_at->format('d M Y') }}</td>
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

