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
                                {{ isset($increment) ? 'Edit' : 'Add' }} Salary Increment
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
                        <div class="card-header">{{ isset($increment) ? 'Edit' : 'Add' }} Salary Increment</div>
                        <div class="card-body">
                            <form
                                action="{{ isset($increment) ? route('salary-increments.update', $increment->id) : route('salary-increments.store') }}"
                                method="POST">
                                @csrf
                                @if(isset($increment))
                                    @method('PUT')
                                @endif

                                <div class="mb-3">
                                    <label for="employee_id" class="form-label">Employee</label>
                                    <select name="employee_id" class="form-select"
                                            required {{ isset($increment) ? 'disabled' : '' }}>
                                        <option value="">-- Select Employee --</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                {{ (old('employee_id') ?? $increment->employee_id ?? '') == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->name }} ({{ $employee->email }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Increment Amount</label>
                                    <input type="number" name="increment_amount" class="form-control" step="0.01"
                                           min="0"
                                           value="{{ old('increment_amount', $increment->increment_amount ?? '') }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Effective Date</label>
                                    <input type="date" name="effective_date" class="form-control"
                                           value="{{ old('effective_date', isset($increment) ? $increment->effective_date : '') }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <textarea name="reason"
                                              class="form-control">{{ old('reason', $increment->reason ?? '') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-success">
                                    {{ isset($increment) ? 'Update' : 'Save' }}
                                </button>
                                <a href="{{ route('salary-increments.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

