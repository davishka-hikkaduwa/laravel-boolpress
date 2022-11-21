@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.categories.create') }}">New</a>
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($categories as $category)
            <div class="col-12">
                <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
