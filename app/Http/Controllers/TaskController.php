<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get()->groupBy('status');
        $tasks_trashed = Task::onlyTrashed()->where('user_id', Auth::id())->get();

        return view('panel.essential.kanban_board.kanban', compact('tasks', 'tasks_trashed'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'todo',
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Task created!');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'status' => 'required|in:todo,in_progress,done',
        ]);

        $task = Task::where('id', $request->task_id)->where('user_id', Auth::id())->firstOrFail();
        $task->status = $request->status;
        $task->save();

        return response()->json(['success' => true]);
    }

    public function inlineUpdate(Request $request)
    {
        $request->validate([
            'task_id' => 'required|integer|exists:tasks,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $task = Task::where('id', $request->task_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted!');
    }

//    --------------------------- restore task ---------------------------

    public function restoreTask($id)
    {
        $task = Task::onlyTrashed()->where('id', $id)->where('user_id', Auth::id())->first();

        if (!$task) {
            return redirect()->back()->with('error', 'Task not found!');
        }

        $task->restore();
        return redirect()->back()->with('success', 'Task restored!');
    }

    public function trashTask($id){
        $task = Task::onlyTrashed()->where('id', $id)->where('user_id', Auth::id())->first();

        if (!$task) {
            return redirect()->back()->with('error', 'Task not found!');
        }

        $task->forceDelete();
        return redirect()->back()->with('success', 'Task permanently deleted!');
    }

    // ------------------------- remove trashed tasks, remove all tasks, restore all trashed tasks -------------------------

    public function restoreAllTrashedTasks()
    {
        $trashedTasks = Task::onlyTrashed()->where('user_id', Auth::id())->get();

        foreach ($trashedTasks as $task) {
            $task->restore();
        }

        return redirect()->back()->with('success', 'All trashed tasks have been restored!');
    }

    public function clearAllTrashedTasks()
    {
        $trashedTasks = Task::onlyTrashed()->where('user_id', Auth::id())->get();

        foreach ($trashedTasks as $task) {
            $task->forceDelete();
        }

        return redirect()->back()->with('success', 'All trashed tasks have been permanently deleted!');
    }

    public function clearAllTasks()
    {
        $tasks = Task::withTrashed()->where('user_id', Auth::id())->get();

        foreach ($tasks as $task) {
            $task->forceDelete();
        }

        return redirect()->back()->with('success', 'All tasks have been permanently deleted!');
    }

}
