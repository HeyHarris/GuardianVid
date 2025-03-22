<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}">
</head>
<body>
<header class="banner-header">
        <div class="banner">
            <h1>Guardian Vids</h1>
            <form method="POST" action="{{ route('logout.post') }}">
                @csrf
                <button class="logout-link" type="submit">Logout</button>
            </form>
        </div>
    </header>

    <section class="video-feed-section">
    @foreach($videos as $video)
        <div class="video-card">
            <a href="{{ asset('storage' . $video->path) }}" target="_blank" class="video-thumb">
                <video muted preload="metadata">
                    <source src="{{ asset('storage' . $video->path) }}" type="video/mp4">
                </video>
            </a>
            <div class="video-info">
                <h3>{{ $video->title }}</h3>
                <p>{{ $video->description }}</p>
                <small>Uploaded {{ $video->uploaded_date->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach
</section>

</body>
</html>