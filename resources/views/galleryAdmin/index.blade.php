@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('gallery.create') }}" class="btn btn-success">Add New Gallery</a>
            </div>
        </div>
        <div class="row">
            @if($galleries->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        No galleries available.
                    </div>
                </div>
            @else
                @foreach($galleries as $gallery)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg rounded-lg overflow-hidden">
                            @if($gallery->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" class="card-img-top object-cover h-48 w-full" alt="{{ $gallery->name }}">
                            @endif
                            <div class="card-body d-flex flex-column justify-between">
                                <h5 class="card-title text-lg font-semibold text-gray-900">{{ $gallery->name }}</h5>
                                <p class="text-sm text-gray-500 mb-2">{{ Str::limit($gallery->description, 100) }}</p>
                                <div class="mt-auto d-flex justify-between">
                                    <a href="{{ route('gallery.show', $gallery->id) }}" class="btn btn-primary btn-sm w-50 mr-1">View Gallery</a>
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline w-50">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
