<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    // Ipakita ang listahan ng mga libro kasama ang Genre relationship
    public function index()
    {
        $books = Book::with('genre')->get();
        return view('books.index', compact('books'));
    }

    // Ipakita ang create form na may kasamang genres dropdown
    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    // I-validate at i-save ang bagong libro
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'published_year' => 'required|integer|digits:4',
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }
}