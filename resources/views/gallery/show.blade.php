@extends('layouts.guest-app')

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{ $gallery->name }}
                    </h1>
                    <p class="text-white link-nav"><a href="{{ url('/') }}">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="{{ route('gallery') }}"> Gallery</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start cat-top Area -->
    <section class="cat-top-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2>{{ $gallery->name }}</h2>
                    <p>{{ $gallery->description }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End cat-top Area -->

    <!-- Start recent-work Area -->
    <section class="recent-work-area section-gap">
        <div class="container">
            <div class="row">
                @foreach($gallery->images as $image)
                    <div class="col-lg-4 single-recent-work">
                        <a class="recent-project" href="{{ asset('storage/' . $image->image_path) }}">
                            <img class="img-fluid" src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery Image">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End recent-work Area -->
@endsection
