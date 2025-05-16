@extends('layouts.template.main')

@section('content')
    <main>
        <header
            class="page-header page-header-compact page-header-light border-bottom bg-white mb-4"
        >
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div
                        class="row align-items-center justify-content-between pt-3"
                    >
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="user"></i>
                                </div>
                                Account Settings - View All Employees
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Settings - View All Employees</div>
                        <div class="card-body">

                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Phone</th>
                                    <th>Joining Date</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Phone</th>
                                    <th>Joining Date</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->user->name }}</td>
                                        <td>{{ $employee->user->email }}</td>
                                        <td>{{ $employee->designation }}</td>
                                        <td>{{ $employee->department }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($employee->joining_date)->format('Y-m-d') }}</td>
                                        <td>{{ number_format($employee->salary, 2) }}/-</td>
                                        <td>
                                            @if($employee->status == 'active')
                                                <span class="badge bg-success text-white rounded-pill">Active</span>
                                            @else
                                                <span class="badge bg-danger text-white rounded-pill">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $employee->user->roles->pluck('name')->implode(', ') }}
                                        </td>

                                        <td>
                                            <a href="{{ route('manager_employee.show', $employee->id) }}"
                                               class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                <i data-feather="eye"></i>
                                            </a>
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
