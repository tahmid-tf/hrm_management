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

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

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


                                        {{--  ---------- If the users role is admin then hr won't be able to modify or remove data ---------- --}}

                                        @if($employee->user->hasRole('admin'))

                                            <td>
                                                <a href="{{ route('hr_employee.show', $employee->id) }}"
                                                   class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                    <i data-feather="eye"></i>
                                                </a>

                                                <a href="{{ route('attendance_individual_list_export', $employee->id) }}"
                                                   class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                                   title="Attendance List Export"
                                                   onclick="return confirm('Confirm to export data?')">
                                                    <i data-feather="download" title="Export Attendance Data"></i>
                                                </a>
                                            </td>

                                        @else

                                            <td>

                                                <a href="{{ route('hr_employee.show', $employee->id) }}"
                                                   class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                    <i data-feather="eye"></i>
                                                </a>

                                                <a href="{{ route('hr_employee.edit', $employee->id) }}"
                                                   class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                    <i data-feather="edit"></i>
                                                </a>

                                                <a href="{{ route('attendance_individual_list_export', $employee->id) }}"
                                                   class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                                   title="Attendance List Export"
                                                   onclick="return confirm('Confirm to export data?')">
                                                    <i data-feather="download" title="Export Attendance Data"></i>
                                                </a>

                                                {{-- -------------------------------- Delete with confirmation -------------------------------- --}}

{{--                                                <form action="{{ route('hr_employee.destroy', $employee->id) }}"--}}
{{--                                                      method="POST"--}}
{{--                                                      class="d-inline"--}}
{{--                                                      onsubmit="return confirm('Are you sure to delete this employee?');">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button class="btn btn-datatable btn-icon btn-transparent-dark">--}}
{{--                                                        <i data-feather="trash-2"></i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}

                                                {{-- -------------------------------- Delete with confirmation -------------------------------- --}}

                                            </td>
                                        @endif
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
