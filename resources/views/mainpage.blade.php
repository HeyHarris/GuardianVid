<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}">
</head>
<body>
<div class="banner">
    <h1>Guardian Vids</h1>
    <form method="POST" action="{{ route('logout.post') }}">
    {{ csrf_field() }}
        <button class="logout-link" type="submit">Logout</button>
    </form>
  </div>


</body>
</html>