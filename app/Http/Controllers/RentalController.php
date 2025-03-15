<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function rent(Request $request, Book $book)
    {
        if (!$book->available) {
            return redirect()->back()->with('error', 'Bu kitob ijaraga olinmaydi!');
        }

        Rental::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'rented_at' => now(),
            'due_date' => now()->addDays(7),
            'returned' => false,
        ]);

        $book->update(['available' => false]);

        return redirect()->back()->with('success', 'Kitob muvaffaqiyatli ijaraga olindi!');
    }

    public function return(Book $book)
    {
        $rental = Rental::where('book_id', $book->id)
                        ->where('user_id', Auth::id())
                        ->where('returned', false)
                        ->first();

        if (!$rental) {
            return redirect()->back()->with('error', 'Siz bu kitobni ijaraga olmagansiz!');
        }

        $rental->update(['returned' => true]);
        $book->update(['available' => true]);

        return redirect()->back()->with('success', 'Kitob qaytarildi!');
    }
}

