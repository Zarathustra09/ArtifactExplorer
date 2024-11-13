@extends('layouts.guest-app')

@section('content')

    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Gallery
                    </h1>
                    <p class="text-white link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('gallery') }}"> Gallery</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-card-area section-gap" id="gallery-card">
        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach($galleries as $gallery)
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            @if($gallery->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" class="card-img-top" alt="{{ $gallery->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $gallery->name }}</h5>
                                <p class="card-text">{{ Str::limit($gallery->description, 100) }}</p>
                                <a href="{{ route('gallery.guest.show', $gallery->id) }}" class="primary-btn text-uppercase">View Gallery</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
