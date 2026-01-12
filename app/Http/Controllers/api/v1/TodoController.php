<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TodoResource;
use App\Http\Requests\v1\TodoRequest;
use App\Models\Todo;
use Inertia\Inertia;

class TodoController extends Controller
{
    public static $per_page = 5;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $todos = Todo::paginate(TodoController::$per_page);

        return Inertia::render('HomeView', [
            'todos' => TodoResource::collection($todos)
        ]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('HomeView');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {

        $todo = Todo::create($request->validated());

        $todos = Todo::paginate(TodoController::$per_page);
        return response()->json([
            'status' => 'success',
            'message' => 'Запись добавлена!',
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Todos/Edit', [
            'todo.id' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, string $id)
    {
        $todo = Todo::findOrFail($id);

        if(!$request->title) {
            $completed = !$todo->completed;

            $todo->update([
                'completed' => $completed
            ]);

            $todos = Todo::paginate(TodoController::$per_page);

            return response()->json([
                'status' => 'success',
                'message' => 'Статус записи изменен!',
                'todos' => $todos,
            ]);
        }

        $todo->update($request->validated());
        $todos = Todo::paginate(TodoController::$per_page);

        return response()->json([
            'status' => 'success',
            'message' => 'Запись изменена!',
            'todos' => $todos,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        $todo = Todo::findOrFail($id);

        $todo->delete();

        $todos = Todo::paginate(TodoController::$per_page);

        return response()->json([
            'status' => 'success',
            'message' => 'Запись удалена!',
            'todos' => $todos,
        ]);

    }
}
