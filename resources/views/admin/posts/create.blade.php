@extends('layouts.admin')

@section('title', 'Add New Post')

@section('content')
<h1>Add New Post</h1>

<form action="{{ route('admin.posts.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Create Post</button>
</form>
@endsection
