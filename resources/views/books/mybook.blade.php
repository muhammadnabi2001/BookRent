
    <h2>Mening ijaraga olingan kitoblarim</h2>

    @if($rentedBooks->isEmpty())
        <p>Siz hali hech qanday kitob ijaraga olmadingiz.</p>
    @else
        @foreach($rentedBooks as $rental)
            <div>
                <h3>{{ $rental->book->title }}</h3>
                <p>Muallif: {{ $rental->book->author }}</p>
                <p>Ijara muddati: {{ $rental->due_date }}</p>
                <p>Status: {{ $rental->returned ? 'Qaytarilgan' : 'Hali qaytarilmagan' }}</p>
            </div>
            <hr>
        @endforeach
    @endif

    <a href="{{route('books.index')}}">⬅️ Ortga</a>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Chiqish</button>
    </form>
