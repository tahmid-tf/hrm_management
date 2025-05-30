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
                                Expense Details
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
                        <div class="card-header">Expense Details</div>
                        <div class="card-body">

                            <p><strong>Employee:</strong> {{ $expense->employee->name }}</p>
                            <p><strong>Category:</strong> {{ $expense->category->name }}</p>
                            <p><strong>Amount:</strong> {{ number_format($expense->amount, 2) }}</p>
                            <p><strong>Date:</strong> {{ $expense->expense_date }}</p>
                            <p><strong>Description:</strong> {{ $expense->description ?? '-' }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($expense->status) }}</p>
                            <p><strong>Admin Comment:</strong> {{ $expense->admin_comment ?? '-' }}</p>
                            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

