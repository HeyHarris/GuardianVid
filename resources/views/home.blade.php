<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

    <div class="banner">
        <h1>Guardian Vid</h1>
    </div>
    <div class="container">
        <h2>Create Account</h2>
        <form action="{{ route('register.post') }}" method="POST">
            {{ csrf_field() }}
            <input name="name" type="text" placeholder="Full Name" required>
            <input name="email" type="email" placeholder="Email Address" required>
            <input name="password" type="password" placeholder="Create Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <a href="{{ route('login') }}" class="login-link">Already have an account? Login</a>
    </div>
</body>
</html>