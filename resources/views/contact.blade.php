@extends('layouts.guest-app')

@section('content')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Contact Us
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row">
                <div class="map-wrap" style="width:100%; height: 445px;" id="gmap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106883.89168153073!2d121.05900533906251!3d14.130207405722297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd65967f38a1e3%3A0xc87b76eeea6afa6f!2sMuseo%20Ni%20Miguel%20Malvar!5e1!3m2!1sen!2sph!4v1731120781507!5m2!1sen!2sph" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 d-flex flex-column address-wrap">
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-home"></span>
                        </div>
                        <div class="contact-details">
                            <h5>Museo ni Miguel Malvar</h5>
                            <p>446R+2WV, Gov. Malvar St,<br>Poblacion 1, Santo Tomas, 4234 Batangas</p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-user"></span>
                        </div>
                        <div class="contact-details">
                            <h5>Ayesha Sayseng-Apostol</h5>
                            <p>Contact Person</p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <div class="contact-details">
                            <h5>mmm@nhcp.gov.ph</h5>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5>Museum Hours</h5>
                    <p>Monday: CLOSED<br>
                        Tuesday: 8:00 AM - 4:00 PM<br>
                        Wednesday: 8:00 AM - 4:00 PM<br>
                        Thursday: 8:00 AM - 4:00 PM<br>
                        Friday: 8:00 AM - 4:00 PM<br>
                        Saturday: 8:00 AM - 4:00 PM<br>
                        Sunday: 8:00 AM - 4:00 PM
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
