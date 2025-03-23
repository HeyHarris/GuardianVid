
@extends('layouts.app')

@section('title', 'Upload')

@section('content')
@if (session('error'))
    <script>
        toastr.options.positionClass = 'toast-top-center';
        toastr.error("{{ session('error') }}");
    </script>
@endif
<div class="upload-card">
    <div class='content'>
    <h2>Upload Video</h2>
    <form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
        <input type="text" name="title" placeholder="Video Title" required>
        <textarea name="description" placeholder="Video Description"></textarea>
        <label>Thumbnail Image:</label>
        <input type="file" name="thumbnail" accept="image/*" required>
        <label>Video File:</label>
        <input type="file" name="video" accept="video/*" required>
        <button type="submit">Upload</button>
    </form>

    </div>
</div>
@endsection