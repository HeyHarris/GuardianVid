@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
    <section class="video-feed-section">
    @if (session('error'))
    <script>
        toastr.options.positionClass = 'toast-top-center';
        toastr.error("{{ session('error') }}");
    </script>
@endif

    @foreach($videos as $video)
        <div class="video-card">
        <a href="{{ asset('storage/' . $video->path) }}" target="_blank" class="video-thumb">
        <video muted preload="metadata" poster="{{ asset('storage/' . $video->thumbnail) }}">
    <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
</video>
            </a>
            <div class="video-info">
                <h3>{{ $video->title }}</h3>
                <p>{{ $video->description }}</p>
                <small id="uploaded-by" >Uploaded by: {{ $video->user->name }}</small>
                <small>Uploaded {{ $video->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach

</section>
@endsection