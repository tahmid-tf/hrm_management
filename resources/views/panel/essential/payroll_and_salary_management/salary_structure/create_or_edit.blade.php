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
                                {{ isset($structure) ? 'Edit' : 'Create' }} Salary Structure
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
                        <div class="card-header">{{ isset($structure) ? 'Edit' : 'Create' }} Salary Structure</div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ isset($structure) ? route('salary-structure.update', $structure->id) : route('salary-structure.store') }}">
                                @csrf
                                @if(isset($structure))
                                    @method('PUT')
                                @endif

                                <div class="mb-3">
                                    <label for="employee_id" class="form-label">Employee</label>
                                    <select name="employee_id" id="employee_id" class="form-control" {{ isset($structure) ? 'disabled' : '' }}>
                                        <option value="">-- Select Employee --</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ isset($structure) && $structure->employee_id == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3"><label>Basic Salary</label>
                                    <input type="number" name="basic_salary" class="form-control" value="{{ old('basic_salary', $structure->basic_salary ?? '') }}" required>
                                </div>

                                <div class="mb-3"><label>Housing Allowance</label>
                                    <input type="number" name="housing_allowance" class="form-control" value="{{ old('housing_allowance', $structure->housing_allowance ?? '') }}">
                                </div>

                                <div class="mb-3"><label>Transport Allowance</label>
                                    <input type="number" name="transport_allowance" class="form-control" value="{{ old('transport_allowance', $structure->transport_allowance ?? '') }}">
                                </div>

                                <div class="mb-3"><label>Other Allowances</label>
                                    <input type="number" name="other_allowances" class="form-control" value="{{ old('other_allowances', $structure->other_allowances ?? '') }}">
                                </div>

                                <div class="mb-3"><label>Effective From</label>
                                    <input type="date" name="effective_from" class="form-control" value="{{ old('effective_from', $structure->effective_from ?? '') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ (old('is_active', $structure->is_active ?? '') == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ (old('is_active', $structure->is_active ?? '') == 0) ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">{{ isset($structure) ? 'Update' : 'Create' }}</button>
                                <a href="{{ route('salary-structure.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

