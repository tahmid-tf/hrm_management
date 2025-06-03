@extends('layouts.template.main')

@section('content')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Task Management Board
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">Task Management Board</div>
                        <div class="card-body">


                            {{-- ----------------------------- session messages ----------------------------- --}}

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>

                            @elseif(session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>
                            @endif

                            {{-- ----------------------------- session messages ----------------------------- --}}

                            {{-- Task Creation Form --}}
                            <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
                                @csrf
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="row g-3 align-items-end">
                                            <div class="col-md-5">
                                                <label for="task-title" class="form-label">Title <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="title" id="task-title" class="form-control"
                                                       placeholder="Enter task title" required>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="task-desc" class="form-label">Description</label>
                                                <input type="text" name="description" id="task-desc"
                                                       class="form-control"
                                                       placeholder="Enter task description (optional)">
                                            </div>
                                            <div class="col-md-2 text-end">
                                                <button class="btn btn-primary w-100" type="submit">
                                                    <i data-feather="plus-circle" class="me-1"></i> Add Task
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- Kanban Board --}}
                            <style>
                                .ghost {
                                    opacity: 0.4;
                                    background: lightgray;
                                }

                                .board {
                                    display: flex;
                                    gap: 20px;
                                    box-sizing: border-box;
                                    justify-content: center;
                                }

                                ul.kanban-column {
                                    list-style: none;
                                    padding: 10px;
                                    width: 300px;
                                    background-color: #ebecf0;
                                    border-radius: 8px;
                                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                                }

                                ul.kanban-column li {
                                    background-color: white;
                                    margin-bottom: 10px;
                                    padding: 12px 16px;
                                    border-radius: 6px;
                                    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
                                    transition: box-shadow 0.2s ease, transform 0.2s ease;
                                    position: relative;
                                }

                                ul.kanban-column li:hover {
                                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
                                    transform: translateY(-2px);
                                }

                                .task-content [contenteditable] {
                                    border-bottom: 1px dashed transparent;
                                    cursor: text;
                                }

                                .task-content [contenteditable]:hover {
                                    border-bottom-color: #ccc;
                                }

                                .task-content {
                                    padding-right: 24px;
                                }

                                .task-content i {
                                    position: absolute;
                                    top: 10px;
                                    right: 10px;
                                    cursor: pointer;
                                    color: #dc3545;
                                }

                                /* ----------- Responsive Styling ----------- */

                                @media (max-width: 992px) {
                                    .board {
                                        flex-direction: column;
                                        align-items: center;
                                    }

                                    ul.kanban-column {
                                        width: 90%;
                                        max-width: 500px;
                                    }
                                }

                                @media (min-width: 993px) and (max-width: 1200px) {
                                    ul.kanban-column {
                                        width: 250px;
                                    }
                                }
                            </style>


                            <div class="board">
                                @php
                                    $statuses = ['todo' => 'To Do', 'in_progress' => 'In Progress', 'done' => 'Done'];
                                @endphp

                                @foreach($statuses as $status => $label)
                                    <ul id="{{ $status }}" class="kanban-column" data-status="{{ $status }}">
                                        <h5 class="text-center">{{ $label }}</h5>
                                        @foreach($tasks[$status] ?? [] as $task)
                                            <li data-id="{{ $task->id }}">
                                                <div class="task-content" data-id="{{ $task->id }}">
                                                    <strong class="editable-title"
                                                            contenteditable="true">{{ $task->title }}</strong>
                                                    <div class="editable-description mt-1 text-muted"
                                                         contenteditable="true">
                                                        {{ $task->description }}
                                                    </div>
                                                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
                                                          style="margin-top: 5px; text-align: right;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-link p-0"
                                                                style="border: none;">
                                                            <i data-feather="trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            {{--  ---------------------------------- Removed Data ---------------------------------- --}}


            {{-- ------------------------------------ Trashed Task Table Render ------------------------------------ --}}

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">Trashed Tasks</div>
                        <div class="card-body">
                            <x-kanban.removed_tasks :tasks="$tasks_trashed"></x-kanban.removed_tasks>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ------------------------------------ Trashed Task Table Render ------------------------------------ --}}

            {{-- ------------------------------------ Task Management Settings ------------------------------------ --}}


            <style>
                /* Scoped styles for Task Management Settings */
                .task-management-settings .task-settings-actions {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                }

                .task-management-settings .task-settings-actions form {
                    flex: 1 1 auto;
                    min-width: 220px;
                }

                .task-management-settings .task-settings-actions button {
                    width: 100%;
                }
            </style>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">Task Management Settings</div>
                        <div class="card-body">

                            <div class="card-body task-management-settings">
                                <div class="task-settings-actions">
                                    {{-- ---- restore all trashed tasks ---- --}}
                                    <form action="{{ route('restore-all-trashed-tasks') }}" method="POST"
                                          onsubmit="return confirm('Are you sure to restore all trashed tasks?');">
                                        @csrf
                                        <button class="btn btn-indigo">Restore all trashed tasks</button>
                                    </form>

                                    {{-- ---- clear all trashed tasks ---- --}}
                                    <form action="{{ route('clear-all-trashed-tasks') }}" method="POST"
                                          onsubmit="return confirm('Are you sure to remove all trashed tasks?');">
                                        @csrf
                                        <button class="btn btn-primary">Clear all trashed tasks</button>
                                    </form>

                                    {{-- ---- clear all tasks ---- --}}
                                    <form action="{{ route('clear-all-tasks') }}" method="POST"
                                          onsubmit="return confirm('Are you sure to remove all tasks?');">
                                        @csrf
                                        <button class="btn btn-danger">Clear all tasks</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            {{-- ------------------------------------ Task Management Settings ------------------------------------ --}}

        </div>
    </main>

    {{-- ------------------------------------------------- SortableJS and javascript part ------------------------------------------------- --}}

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            feather.replace();

            const statuses = ['todo', 'in_progress', 'done'];

            statuses.forEach(status => {
                new Sortable(document.getElementById(status), {
                    group: 'shared',
                    animation: 150,
                    ghostClass: 'ghost',
                    onAdd: function (evt) {
                        const taskId = evt.item.dataset.id;
                        const newStatus = evt.to.dataset.status;

                        fetch("{{ route('tasks.updateStatus') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                task_id: taskId,
                                status: newStatus
                            })
                        }).then(res => res.json()).then(data => {
                            if (!data.success) alert("Status update failed");
                        });
                    }
                });
            });

            function saveTaskContent(el) {
                const parent = el.closest('.task-content');
                const taskId = parent.dataset.id;
                const title = parent.querySelector('.editable-title').innerText.trim();
                const description = parent.querySelector('.editable-description').innerText.trim();

                fetch("{{ route('tasks.inlineUpdate') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        task_id: taskId,
                        title: title,
                        description: description
                    })
                }).then(res => res.json()).then(data => {
                    if (!data.success) alert("Failed to update task");
                });
            }

            document.querySelectorAll('.editable-title, .editable-description').forEach(el => {
                el.addEventListener('blur', () => saveTaskContent(el));
                el.addEventListener('keydown', e => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        el.blur(); // triggers blur and save
                    }
                });
            });
        });
    </script>
@endsection
