@extends('layouts.guest-app')

@section('content')
    <style>
        .fa-star {
            color: green;
        }
    </style>
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-8">
                    <h6 class="text-white">Be ready to see chivalry</h6>
                    <h1 class="text-white">
                        Heneral Miguel Malvar
                    </h1>
                    <p class="pt-20 pb-20 text-white">
                        A museum that showcases the life and times of Gen. Miguel Malvar.
                    </p>
                    <a href="{{route('contact')}}" class="primary-btn text-uppercase">Visit Now!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <section class="service-area pt-100" id="about">
        <div class="container">
            <div class="row">
                @foreach($averages as $average)
                    <div class="col-lg-3">
                        <div class="single-service">
                            <span class="{{ $average->icon }}"></span>
                            <h4>{{ $average->title }}</h4>
                            <p>
                                Average Rating: {{ number_format($average->average_value, 2) }}
                            </p>
                            <div class="overlay">
                                <div class="text">
                                    <p>
                                        The average rating for "{{ $average->title }}" is {{ number_format($average->average_value, 2) }}.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Start quote Area -->
    <section class="quote-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 quote-left">
                    <h1>
                        "<span>You're like a man who loves nothing better than a thick steak</span> but wouldn't last an hour
                        in a <span>slaughterhouse</span>."
                    </h1>
                </div>
                <div class="col-lg-6 quote-right">
                    <p>
                        <strong>Miguel stood out among all the other contemporaries during the Philippine revolutionary army.
                            While the others seemed to waste a lot of time trying to sow political intrigues, he opted to lead on the battlefield.
                            He spent practically all his time leading his men in battling for their independence from Spain between August 1896 and December 1897.
                        </strong><br>
                        <a href="https://kami.com.ph/108129-miguel-malvar-biography-quotes-contribution-books.html" target="_blank">Read more</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- End quote Area -->


    <!-- Start upcoming-event Area -->
    <section class="upcoming-event-area section-gap" id="events">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Checkout our new Application</h1>
                        <p>For those who are passionate about Heroism.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 event-left">
                    <div class="single-events">
                        <img class="img-fluid" src="{{ asset('NEW CONTENT/handapp.png') }}" alt="New App">
                        <a href="#"><h4>Experience the future of heroism with our new app!</h4></a>
                        <h6><span>Available Now</span> on all major platforms</h6>
                        <p>Join us as we bring you an immersive journey into the world of heroism and epic adventures. Our app offers a unique blend of storytelling, action, and engagement.</p>
                        <a href="{{asset('NEW CONTENT/Malvar.apk')}}" class="primary-btn text-uppercase">Download Now</a>
                    </div>
                </div>
                <div class="col-lg-6 event-right">
                    <div class="single-events">
                        <a href="#"><h4>Epic Heroes Await You!</h4></a>
                        <h6><span>Available Now</span> on all major platforms</h6>
                        <p>Embrace your inner hero with our new application. Whether you're looking for thrilling adventures or simply exploring the world of heroism, we've got you covered!</p>
                        <img class="img-fluid" src="{{ asset('NEW CONTENT/Artifact Explorer.png') }}" alt="New App">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End upcoming-event Area -->

    <section class="exibition-area section-gap" id="exhibitions">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Survey Reports</h1> <!-- Title without green color -->
                        <p style="color: #5E8C00;">Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-exibition-carusel">
                    @foreach($results as $result)
                        <div class="single-exibition item">
                            <h4>{{ $result->survey_name }}</h4> <!-- Survey name without green color -->
                            <p style="color: #497000;">{{ $result->question_content }}</p>
                            <p style="color: #355400;">{!! $result->answer_value !!}</p>
                            <p style="color: #2A4300;">Anonymous Visitor</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- Start gallery Area -->
    <section class="gallery-area section-gap" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10 text-white">Our Exhibition Gallery</h1>
                        <p>Welcome to our Exhibition Gallery, where creativity, culture, and history come alive! Here, we proudly showcase an ever-evolving collection of curated works that tell compelling stories, celebrate human ingenuity, and connect the past with the present.</p>
                    </div>
                </div>
            </div>
            <div id="grid-container" class="row">
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Battle-of-Zapote-Bridge.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Battle-of-Zapote-Bridge.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Emilio-Aguinaldo-Centenary.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Emilio-Aguinaldo-Centenary.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Centenary.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Centenary.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-fighting-on-horseback.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-fighting-on-horseback.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-malvar-Leader-of-the-Masses.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-malvar-Leader-of-the-Masses.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Wearing-his-Uniform.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Wearing-his-Uniform.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-with-his-wife-Paula.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-with-his-wife-Paula.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Silver-finial.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Silver-finial.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/1965-Malvar-Centennial-Commemorative-Medallions.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/1965-Malvar-Centennial-Commemorative-Medallions.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/2015-Malvar-Sesquicentennial-Commemorative-Coins.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/2015-Malvar-Sesquicentennial-Commemorative-Coins.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/Case-of-Coins-and-Medals.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/Case-of-Coins-and-Medals.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/Pamana-ni-Miguel-Malvar.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/Pamana-ni-Miguel-Malvar.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/The-Surrender.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/The-Surrender.jpg') }}" loading="lazy"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/hallway/Battle-in-Tayabas.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/hallway/Battle-in-Tayabas.jpg') }}" loading="lazy"></a>
            </div>

        </div>
    </section>
    <!-- End gallery Area -->

@endsection
