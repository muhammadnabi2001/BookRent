<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function mybooks()
    {
        $user = Auth::user();
        $rentedBooks = Rental::where('user_id', $user->id)->with('book')->get();

        return view('books.mybook', compact('rentedBooks'));
    }
}
