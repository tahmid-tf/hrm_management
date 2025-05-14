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
                                Account Settings - Employee Account Creation
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
                        <div class="card-header">Account Settings - Employee Account Creation</div>
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
                                    <br>
                            @endif

                            <form method="post" action="{{ route('hr_employee.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <!-- --------------------------------- Name & Email --------------------------------- -->

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder=""
                                            value=""
                                            name="name"
                                        />
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Email</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="email"
                                            placeholder=""
                                            value=""
                                            name="email"
                                        />
                                    </div>


                                </div>

                                <!-- --------------------------------- Name & Email --------------------------------- -->


                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Password</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder=""
                                            value=""
                                            name="password"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Phone</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder=""
                                            value=""
                                            name="phone"
                                        />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Date of birth</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="date"
                                            placeholder=""
                                            value=""
                                            name="date_of_birth"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Gender</label
                                        >

                                        <select class="form-select" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Designation</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder=""
                                            value=""
                                            name="designation"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Department</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder=""
                                            value=""
                                            name="department"
                                        />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Joining Date</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="date"
                                            placeholder=""
                                            value=""
                                            name="joining_date"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Salary</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="number"
                                            placeholder=""
                                            value=""
                                            name="salary"
                                            min="0"
                                        />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Address</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder=""
                                            value=""
                                            name="address"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Status</label
                                        >

                                        <select class="form-select" name="status">
                                            <option value="active" selected>Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Image File</label
                                        >
                                        <input class="form-control" type="file" name="image">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Role Selection</label
                                        >
                                        <select class="form-select" name="role">
{{--                                            <option value="admin">Admin</option>--}}
                                            <option value="hr">HR</option>
                                            <option value="manager">Manager</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>

                                </div>

                                <button class="btn btn-primary" type="submit">
                                    Save changes
                                </button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
