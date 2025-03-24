<header class="banner-header">
        <div class="banner">
            <h1>Guardian Vids</h1>
            <form method="POST" action="{{ route('logout.post') }}">
                @csrf
                <button class="logout-link" type="submit">Logout</button>
            </form>
        </div>

<div class="side-upload-link">
    <a href="{{ route('mainpage') }}">Your Feed</a>
    <a href="{{ route('upload') }}">+ Upload Video</a>
    <a href="{{ route('useruploads') }}">Your Uploads</a>
    @if(Auth::user()?->isAdmin())
    <a href="{{ route('moderation') }}">Moderation Feed</a>
@endif
</div>
</header>