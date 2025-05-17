<div>
    <table id="datatablesSimple">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)

            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>

                    @if($task->status == 'todo')
                        <div class="badge bg-primary text-white rounded-pill">To Do</div>

                    @elseif($task->status == 'in_progress')
                        <div class="badge bg-info text-white rounded-pill">In Progress</div>

                    @elseif($task->status == 'done')
                        <div class="badge bg-success text-white rounded-pill">Done</div>
                    @endif

                </td>
                <td>


                    {{--  ------------------------------ restore task ------------------------------ --}}

                    <form action="{{ route('restore-task', $task->id) }}" method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Are you sure to restore this task?');">
                        @csrf
                        <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" title="Restore"><i
                                data-feather="rotate-ccw"></i></button>
                    </form>

                    {{--  ------------------------------ restore task ------------------------------ --}}

                    {{--  ------------------------------ delete trashed tasks ------------------------------ --}}


                    <form action="{{ route('trash-task', $task->id) }}" method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Are you sure to delete this task permanently?');">
                        @csrf
                        <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Trash"><i
                                data-feather="trash-2"></i></button>
                    </form>

                    {{--  ------------------------------ delete trashed tasks ------------------------------ --}}


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
