@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div>
            <label for="title">Title: </label>
            <input type="text" required minlength="10" maxlength="50" name="title" value="{{ old('title', '') }}">
        </div>
        <div>
            <label for="content">Content: </label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', '') }}</textarea>
        </div>
        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
