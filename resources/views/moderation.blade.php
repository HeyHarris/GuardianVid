@extends('layouts.app')

@section('title', 'Moderation Queue')

@section('content')

<section class="video-feed-section-moderator">
@foreach($videos as $video)
<div class="video-card-moderator">
    <div class="video-thumb-moderator">
        <video controls preload="metadata" poster="{{ asset('storage/' . $video->thumbnail) }}">
            <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="video-info-moderator">
        <h3>{{ $video->title }}</h3>
        <p>{{ $video->description }}</p>
        <small id="uploaded-by-moderator">Uploaded by: {{ $video->user->name }}</small>
        <small>Uploaded {{ $video->created_at->diffForHumans() }}</small>

        <div class="moderation-actions">
            <form class="moderator-actions"  action="{{ route('moderation.approve', $video->id) }}" method="POST">
                @csrf
                <button class="approve" type="submit">Approve</button>
            </form>
            <form class="moderator-actions"  action="{{ route('moderation.reject', $video->id) }}" method="POST">
                @csrf
                <button class="reject" type="submit">Reject</button>
            </form>
        </div>
    </div>
</div>
    @endforeach
    </section>
@endsection