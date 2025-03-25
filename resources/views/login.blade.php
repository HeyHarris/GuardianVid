<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Guardian Vid</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>


    <div class="banner-login">
        <h1>Guardian Vid</h1>
    </div>
    <div class="container">
        <h2>Login</h2>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <input name="email" type="email" placeholder="Email Address" required>
            <input name="password" type="password" placeholder="Create Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="{{ route('home') }}" class="login-link">Don't have an account? Sign Up!</a>
    </div>

</body>

</html>