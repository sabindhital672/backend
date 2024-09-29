<!-- resources/views/posts/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
        <h1 class="mb-4">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
    </div>
</div>
@endsection
