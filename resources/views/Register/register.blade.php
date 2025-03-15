<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ro'yxatdan o'tish</title>
</head>
<body>
    <h2>Ro'yxatdan o'tish</h2>

    @if ($errors->any())
        <p style="color: red;">Iltimos, xatolarni to‘g‘rilang:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Ism" required style="width: 250px; padding: 8px; margin: 5px 0;"><br>
        <input type="email" name="email" placeholder="Email" required style="width: 250px; padding: 8px; margin: 5px 0;"><br>
        <input type="password" name="password" placeholder="Parol" required style="width: 250px; padding: 8px; margin: 5px 0;"><br>
        <input type="password" name="password_confirmation" placeholder="Parolni tasdiqlang" required style="width: 250px; padding: 8px; margin: 5px 0;"><br>
        <button type="submit" style="padding: 8px 15px;">Ro‘yxatdan o‘tish</button>
    </form>
</body>
</html>
