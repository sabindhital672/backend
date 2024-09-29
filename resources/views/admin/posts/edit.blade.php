@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
<h1>Edit Post</h1>

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update Post</button>
</form>
@endsection
