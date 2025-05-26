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
                                Add Deduction
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
                        <div class="card-header">Add Deduction</div>
                        <div class="card-body">

                            <form action="{{ route('deductions.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="employee_id">Employee</label>
                                    <select name="employee_id" id="employee_id" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        @foreach($employees as $employee)
                                            <option
                                                value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('employee_id')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="month">Month</label>
                                    <input type="month" name="month" id="month" class="form-control"
                                           value="{{ old('month') }}" required>
                                    @error('month')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="type">Deduction Type</label>
                                    <input type="text" name="type" id="type" class="form-control"
                                           value="{{ old('type') }}" required>
                                    @error('type')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="amount">Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control" step="0.01"
                                           value="{{ old('amount') }}" required>
                                    @error('amount')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" id="remarks"
                                              class="form-control">{{ old('remarks') }}</textarea>
                                    @error('remarks')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('deductions.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

