@extends('layouts.guest-app')

@section('content')

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



    <!-- Start gallery Area -->
    <section class="gallery-area section-gap" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10 text-white">Our Exhibition Gallery</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div id="grid-container" class="row">
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Battle-of-Zapote-Bridge.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Battle-of-Zapote-Bridge.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Emilio-Aguinaldo-Centenary.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Emilio-Aguinaldo-Centenary.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Centenary.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Centenary.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-fighting-on-horseback.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-fighting-on-horseback.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-malvar-Leader-of-the-Masses.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-malvar-Leader-of-the-Masses.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Wearing-his-Uniform.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Wearing-his-Uniform.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-with-his-wife-Paula.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-with-his-wife-Paula.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_1n2/Silver-finial.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_1n2/Silver-finial.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/1965-Malvar-Centennial-Commemorative-Medallions.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/1965-Malvar-Centennial-Commemorative-Medallions.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/2015-Malvar-Sesquicentennial-Commemorative-Coins.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/2015-Malvar-Sesquicentennial-Commemorative-Coins.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/Case-of-Coins-and-Medals.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/Case-of-Coins-and-Medals.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/Pamana-ni-Miguel-Malvar.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/Pamana-ni-Miguel-Malvar.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/gallery_3/The-Surrender.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/gallery_3/The-Surrender.jpg') }}"></a>
                <a class="single-gallery" href="{{ asset('gallery_img/hallway/Battle-in-Tayabas.jpg') }}"><img class="grid-item" src="{{ asset('gallery_img/hallway/Battle-in-Tayabas.jpg') }}"></a>

            </div>

        </div>
    </section>
    <!-- End gallery Area -->

@endsection
