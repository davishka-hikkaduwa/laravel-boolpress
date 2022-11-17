@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    @if ($post->category)
        <p>{{ $post->category->name }}</p>
    @else
        <p>Uncategorized</p>
    @endif

    <div class="mt-5">
        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
    </div>

    <div class="mt-2">
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" onclick="confirm('Are you sure you want to delete this post?')">
        </form>
    </div>
@endsection
