@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div @error('name') class="is-invalid" @enderror>
            <label for="name">Category name: </label>
            <input type="text" name="name" maxlength="30" required value="{{ old('name', '') }}">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
