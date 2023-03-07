<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('genres', 'author')->paginate(10);

        return response()->json([
            'success' => true,
            'results' => $books,
        ]);
    }

    public function show(Book $book)
    {
        $book = Book::with('genres', 'author')->findOrFail($book->id);

        return response()->json([
            'success' => true,
            'results' => $book,
        ]);
    }
}