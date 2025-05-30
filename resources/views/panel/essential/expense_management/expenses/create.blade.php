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
                                Add New Expense
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
                        <div class="card-header">Add New Expense</div>
                        <div class="card-body">

                            <form action="{{ route('expenses.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Amount</label>
                                    <input type="number" name="amount" class="form-control" step="0.01" required>
                                </div>

                                <div class="mb-3">
                                    <label>Date</label>
                                    <input type="date" name="expense_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>

                                <button class="btn btn-success">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

