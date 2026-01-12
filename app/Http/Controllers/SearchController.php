<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\TodoController;
use App\Models\Todo;
use Inertia\Inertia;

class SearchController extends Controller
{
    /**
     * Search and Display the specified resource.
     */
    public function search(String $query)
    {

        $q = Todo::query();

        $result = $q->where('title', 'like', "%{$query}%");
        $todos = $result->paginate(TodoController::$per_page)->withQueryString();


        return Inertia::render('SearchResult', [
            'todos' => $todos,
            'countTodos' => $todos->count(),
            'query' => $query,
        ]);

    }
}
