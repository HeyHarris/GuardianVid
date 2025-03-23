<header class="banner-header">
        <div class="banner">
            <h1>Guardian Vids</h1>
            <form method="POST" action="{{ route('logout.post') }}">
                @csrf
                <button class="logout-link" type="submit">Logout</button>
            </form>
        </div>
</header>