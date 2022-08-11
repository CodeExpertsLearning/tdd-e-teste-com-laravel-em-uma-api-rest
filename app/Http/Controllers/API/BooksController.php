<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BooksRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct(private Book $book)
    {
    }

    public function index()
    {
        return response()->json($this->book->all());
    }

    public function show($id)
    {
        $book = $this->book->find($id);

        return response()->json($book);
    }

    public function store(BooksRequest $request)
    {
        $book = $this->book->create($request->all());

        return response()->json($book, 201);
    }

    public function update($id, Request $request)
    {
        $book = $this->book->find($id);
        $book->update($request->all());

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = $this->book->find($id);
        $book->delete();

        return response()->json([], 204);
    }
}
