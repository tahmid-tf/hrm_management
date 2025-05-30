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
                                All Expenses
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
                        <div class="card-header">All Expenses</div>
                        <div class="card-body">


                            <!-- Bulk Action Form Starts -->
                            <form id="bulk-action-form" method="POST">
                                @csrf

                                <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Add New
                                    Expense</a>
                                <a href="#" onclick="submitForm('accept')" class="btn btn-success mb-3">Accept Selected
                                    Expenses</a>
                                <a href="#" onclick="submitForm('reject')" class="btn btn-danger mb-3">Reject Selected
                                    Expenses</a>
                            </form>
                            <!-- Bulk Action Form Ends -->

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Token</th>
                                    <th>Employee</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Admin Comment</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expenses as $expense)
                                    <tr>
                                        <!-- This checkbox is now OUTSIDE the form, so we will use JS to move selected values into the form before submitting -->

                                        @if($expense->status == 'pending')

                                            <td><input type="checkbox" value="{{ $expense->id }}"
                                                       class="expense-checkbox">
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>#{{ $expense->id }}</td>
                                        <td>{{ $expense->employee->name }}</td>
                                        <td>{{ $expense->category->name }}</td>
                                        <td>{{ number_format($expense->amount, 2) }}</td>
                                        <td>{{ $expense->expense_date }}</td>
                                        <td>{{ ucfirst($expense->status) }}</td>
                                        <td>{{ $expense->admin_comment ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('expenses.show', $expense) }}"
                                               class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('expenses.edit', $expense) }}"
                                               class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('expenses.destroy', $expense) }}" method="POST"
                                                  style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete
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


        <script>
            function submitForm(actionType) {
                const form = document.getElementById('bulk-action-form');

                // Clear any old hidden inputs
                form.querySelectorAll('input[name="selected_expenses[]"]').forEach(e => e.remove());

                // Get selected checkboxes
                const selected = document.querySelectorAll('.expense-checkbox:checked');
                if (selected.length === 0) {
                    alert('Please select at least one expense.');
                    return;
                }

                // Add selected IDs to the form as hidden inputs
                selected.forEach(cb => {
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'selected_expenses[]';
                    hidden.value = cb.value;
                    form.appendChild(hidden);
                });

                // Set the form action
                if (actionType === 'accept') {
                    form.action = "{{ route('expenses.bulkAccept') }}";
                } else if (actionType === 'reject') {
                    form.action = "{{ route('expenses.bulkReject') }}";
                }

                form.submit();
            }
        </script>


    </main>
@endsection

