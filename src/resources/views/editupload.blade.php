@extends('layouts.app')

@section('title', 'Edit Upload')

@section('content')
    @if (session('error'))
        <script>
            toastr.options.positionClass = 'toast-top-center';
            toastr.error("{{ session('error') }}");
        </script>
    @endif
    <div class="edit-upload-card">
        <h2>Edit Your Video</h2>

        <form action="{{ route('useruploads.edit', $editVideo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ old('title', $editVideo->title) }}" required>

            <label for="description">Description:</label>
            <textarea name="description" rows="4" required>{{ old('description', $editVideo->description) }}</textarea>

            <label>Current Thumbnail:</label>
            <div class="thumbnail-preview">
                <img src="{{ asset('storage/' . $editVideo->thumbnail) }}" alt="Thumbnail"
                    style="width: 70%; height: auto;">
            </div>

            <label for="thumbnail">Replace Thumbnail (optional):</label>
            <input type="file" name="thumbnail" accept="image/*">

            <button type="submit">Save Changes</button>
        </form>
    </div>
@endsection