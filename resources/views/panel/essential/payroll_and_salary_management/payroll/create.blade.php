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
                                Process Payroll
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
                        <div class="card-header">Process Payroll</div>
                        <div class="card-body">

                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form action="{{ route('payrolls.store') }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="employee_id">Employee</label>
                                    <select name="employee_id" id="employee_id" class="form-control" required>
                                        <option value="">-- Select Employee --</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}
                                                ({{ $employee->email }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('employee_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="month">Payroll Month</label>
                                    <input type="month" name="month" class="form-control" required>
                                    @error('month') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Process Payroll</button>
                                <a href="{{ route('payrolls.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

