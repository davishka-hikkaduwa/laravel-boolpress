@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Title: </label>
            <input type="text" required minlength="10" maxlength="50" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div>
            <label for="content">Content: </label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
@endsection
