<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $tasks = Task::orderBy('status', 'desc')
            ->paginate(8);

        return inertia('Tasks/Index', [
            'page_result' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Tasks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required|max:200',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task = new Task($request->only([
            'title',
            'description',
            'priority'
        ]));

        $task->status = 'pending';
        $task->user_id = Auth::user()->id;

        $task->save();

        return redirect(route('tasks.index'))
            ->with('success', 'Registrado correctamente')
            ->with('task', $task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        if ($task->user_id !== Auth::user()->id) {
            return redirect(route('tasks.index'))
                ->with('error', 'No tienes permiso para editar esta tarea');
        }

        return inertia('Tasks/Edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable|max:200',
            'description' => 'nullable|max:200',
            'status' => 'nullable|in:pending,completed',
            'priority' => 'nullable|in:low,medium,high',
        ]);

        $task = Task::findOrFail($id);

        if ($task->user_id !== Auth::user()->id) {
            return redirect(route('tasks.index'))
                ->with('error', 'No tienes permiso para editar esta tarea');
        }

        if ($request->has('status')) {
            $task->status = $request->input('status');
        }

        if ($request->has('priority')) {
            $task->priority = $request->input('priority');
        }

        if ($request->has('title')) {
            $task->title = $request->input('title');
        }

        if ($request->has('description')) {
            $task->description = $request->input('description');
        }

        $task->save();

        return redirect(route('tasks.index'))
            ->with('success', 'Actualizado correctamente')
            ->with('task', $task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);

        if ($task->user_id !== Auth::user()->id) {
            return redirect(route('tasks.index'))
                ->with('error', 'No tienes permiso para eliminar esta tarea');
        }
        $task->delete();

        return redirect(route('tasks.index'))
            ->with('success', 'Eliminado correctamente');
    }
}
