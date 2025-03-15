@if(Auth::check())
    <p>Salom, {{ Auth::user()->name }}!</p>

    <a href="{{route('mybooks')}}">Mening kitoblarim</a>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Chiqish</button>
    </form>
@endif

@foreach($books as $book)
    <div>
        <h2>{{ $book->title }}</h2>
        <p>Muallif: {{ $book->author }}</p>
        <p>Yili: {{ $book->year }}</p>

        @if($book->available)
            <form action="{{ route('rent.book', $book) }}" method="POST">
                @csrf
                <button type="submit">Ijaraga olish</button>
            </form>
        @else
            <p>Bu kitob hozirda band qilingan.</p>
        @endif
    </div>
@endforeach
