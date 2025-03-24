@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
@if (session('success'))
    <script>
        toastr.options.positionClass = 'toast-top-center';
        toastr.success("{{ session('success') }}");
    </script>
@endif
<section class="video-feed-section-user">
@foreach($videos as $video)
<div class="video-card-user">
    <div class="video-thumb-user">
        <video controls preload="metadata" poster="{{ asset('storage/' . $video->thumbnail) }}">
            <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="video-info-user">
        <h3>{{ $video->title }}</h3>
        <p>{{ $video->description }}</p>
        <small id="uploaded-by-user">Uploaded by: {{ $video->user->name }}</small>
        <small>Uploaded {{ $video->created_at->diffForHumans() }}</small>

        <div class="moderation-actions">
           
        <a href="{{ route('useruploads.createEdit', $video->id) }}">
            <button class="edit" type="button">Edit</button>
        </a>

            <form class="user-actions"  action="{{ route('useruploads.delete', $video->id) }}" method="POST">
                @csrf
                <button class="delete" type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>
    @endforeach
    </section>
@endsection