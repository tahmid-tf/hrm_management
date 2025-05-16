@extends('layouts.template.main')

@section('content')
    <main>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">Employee Details</div>
                        <div class="card-body">

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label><strong>Name:</strong></label>
                                    <p>{{ $employee->user->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Email:</strong></label>
                                    <p>{{ $employee->user->email }}</p>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label><strong>Phone:</strong></label>
                                    <p>{{ $employee->phone }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Date of Birth:</strong></label>
                                    <p>{{ $employee->date_of_birth }}</p>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label><strong>Gender:</strong></label>
                                    <p>{{ ucfirst($employee->gender) }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Designation:</strong></label>
                                    <p>{{ $employee->designation }}</p>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label><strong>Department:</strong></label>
                                    <p>{{ $employee->department }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Joining Date:</strong></label>
                                    <p>{{ $employee->joining_date }}</p>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label><strong>Salary:</strong></label>
                                    <p>{{ number_format($employee->salary) }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Status:</strong></label>
                                    <p>
                                        <span class="badge bg-{{ $employee->status === 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($employee->status) }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label><strong>Address:</strong></label>
                                    <p>{{ $employee->address }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Image:</strong></label><br>
                                    @if($employee->image)
                                        <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" width="100">
                                    @else
                                        <p>No image uploaded</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label><strong>Role:</strong></label>
                                    <p>
                                        @foreach($employee->user->roles as $role)
                                            <span class="badge bg-primary">{{ ucfirst($role->name) }}</span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
