@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role" required>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update User</button>
</form>
@endsection
