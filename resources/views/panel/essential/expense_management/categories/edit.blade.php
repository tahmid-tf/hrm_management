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
                                Edit Expense Category
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
                        <div class="card-header">Edit Expense Category</div>
                        <div class="card-body">
                            <form action="{{ route('expense-categories.update', $category) }}" method="POST">
                                @csrf @method('PUT')

                                <div class="mb-3">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description"
                                              class="form-control">{{ $category->description }}</textarea>
                                </div>

                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

