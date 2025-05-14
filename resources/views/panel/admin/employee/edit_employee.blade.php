@extends('layouts.template.main')

@section('content')
    <main>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-0">
                        <div class="card-header">Update Employee Details</div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('employee.update', $employee->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="name"
                                               value="{{ old('name', $employee->user->name) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email"
                                               value="{{ old('email', $employee->user->email) }}">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" name="phone"
                                               value="{{ old('phone', $employee->phone) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Date of Birth</label>
                                        <input class="form-control" type="date" name="date_of_birth"
                                               value="{{ old('date_of_birth', $employee->date_of_birth) }}">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <select class="form-select" name="gender">
                                            <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>
                                                Male
                                            </option>
                                            <option
                                                value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                            <option value="other" {{ $employee->gender == 'other' ? 'selected' : '' }}>
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Designation</label>
                                        <input class="form-control" type="text" name="designation"
                                               value="{{ old('designation', $employee->designation) }}">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label>Department</label>
                                        <input class="form-control" type="text" name="department"
                                               value="{{ old('department', $employee->department) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Joining Date</label>
                                        <input class="form-control" type="date" name="joining_date"
                                               value="{{ old('joining_date', $employee->joining_date) }}">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label>Salary</label>
                                        <input class="form-control" type="number" name="salary" min="0"
                                               value="{{ old('salary', $employee->salary) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Status</label>
                                        <select class="form-select" name="status">
                                            <option
                                                value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option
                                                value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="address"
                                               value="{{ old('address', $employee->address) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Image</label>
                                        <input class="form-control" type="file" name="image">
                                        @if($employee->image)
                                            <img src="{{ asset('storage/' . $employee->image) }}" alt="Current Image"
                                                 width="100" class="mt-2">
                                        @endif
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label>Role</label>
                                        <select class="form-select" name="role">
                                            @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $employee->user->hasRole($role->name) ? 'selected' : '' }}>
                                                    {{ ucfirst($role->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
