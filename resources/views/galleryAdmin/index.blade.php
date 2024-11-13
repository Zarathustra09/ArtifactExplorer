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
                    <div class="alert alert-warning" role="alert">
                        No galleries available.
                    </div>
                </div>
            @else
                @foreach($galleries as $gallery)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            @if($gallery->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" class="card-img-top" alt="{{ $gallery->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $gallery->name }}</h5>
                                <a href="{{ route('gallery.show', $gallery->id) }}" class="btn btn-primary">View Gallery</a>
                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
