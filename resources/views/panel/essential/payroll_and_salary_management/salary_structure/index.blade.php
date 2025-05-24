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
                                Salary Structure
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
                        <div class="card-header">Salary Structure</div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Basic</th>
                                    <th>Housing</th>
                                    <th>Transport</th>
                                    <th>Other</th>
                                    <th>Effective From</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($structures as $structure)
                                    <tr>
                                        <td>{{ $structure->employee->name }}</td>
                                        <td>{{ number_format($structure->basic_salary, 2) ?? ''}}</td>
                                        <td>{{ number_format($structure->housing_allowance, 2) }}</td>
                                        <td>{{ number_format($structure->transport_allowance, 2) }}</td>
                                        <td>{{ number_format($structure->other_allowances, 2) }}</td>
                                        <td>{{ $structure->effective_from }}</td>
                                        <td>
                    <span class="badge {{ $structure->is_active ? 'bg-success' : 'bg-secondary' }}">
                        {{ $structure->is_active ? 'Active' : 'Inactive' }}
                    </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('salary-structure.edit', $structure->id) }}" class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                <i data-feather="edit" title="Edit Data"></i>
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

