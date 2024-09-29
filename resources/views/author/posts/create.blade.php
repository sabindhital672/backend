<!-- resources/views/posts/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
        <h1 class="mb-4">Create Post</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
