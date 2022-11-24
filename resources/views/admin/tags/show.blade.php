@extends('layouts.dashboard')

@section('content')
    <h3>{{ $tag->name }}</h3>

    <div>
        <form action="{{ route('admin.tags.update', $tag->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ old('name', $tag->name) }}"
                @error('name') class="dh-is-invalid" @enderror>
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="submit" value="UPDATE">

        </form>
    </div>
    <div>
        <form action="{{ route('admin.tags.destroy', $tag->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="DELETE">
        </form>
    </div>
@endsection
