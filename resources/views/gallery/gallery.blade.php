<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Museo ni Miguel Malvar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS
    ================================================== -->
    <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing-page/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/bootstrap-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/custom-styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="{{ asset('landing-page/css/style-ie.css') }}"/>
<![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('new_logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('new_logo.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('new_logo.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('new_logo.png') }}">

    <!-- JS -->
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="{{ asset('landing-page/js/bootstrap.js') }}"></script>
    <script src="{{ asset('landing-page/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('landing-page/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('landing-page/js/jquery.custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Skeleton loading effect */
        .skeleton {
            background-color: #e0e0e0;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        .skeleton::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: -150%;
            height: 100%;
            width: 150%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
            animation: skeleton-loading 1.5s infinite;
        }

        @keyframes skeleton-loading {
            0% {
                left: -150%;
            }
            50% {
                left: 100%;
            }
            100% {
                left: -150%;
            }
        }

        .skeleton-image {
            height: 160px;
            width: 300px;
        }

        .skeleton-text {
            width: 80%;
            height: 20px;
            margin-top: 10px;
        }

    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#btn-blog-next").click(function () {
                $('#blogCarousel').carousel('next')
            });
            $("#btn-blog-prev").click(function () {
                $('#blogCarousel').carousel('prev')
            });

            $("#btn-client-next").click(function () {
                $('#clientCarousel').carousel('next')
            });
            $("#btn-client-prev").click(function () {
                $('#clientCarousel').carousel('prev')
            });
        });

        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                slideshow: true,
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>

</head>

<body class="home">
<!-- Color Bars (above header)-->
<div class="color-bar-1"></div>
<div class="color-bar-2 color-bg"></div>

<div class="container">

    @include('layouts.header')

    <!-- Slider Carousel
       ================================================== -->
    <div class="row gallery-row"><!-- Begin Gallery Row -->

        <div class="span12">

            <!-- Gallery Thumbnails
            ================================================== -->

            <div class="row clearfix no-margin">
                <ul class="gallery-post-grid holder">

                    <h3>Gallery 1 and 2</h3>

                    <!-- Gallery 1 and 2 Items -->
                    <li class="span3 gallery-item" data-id="id-1" data-type="illustration">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
            </span>
                        <a href=""><img src="{{ asset('gallery_img/gallery_1n2/Battle-of-Zapote-Bridge.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="">Battle of Zapote Bridge</a>For an international ad campaign.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-2" data-type="illustration">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-fighting-on-horseback.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Malvar fighting on horseback</a>For a regional festival event.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-3" data-type="web">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_1n2/Miguel-malvar-Leader-of-the-Masses.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Malvar leader of the masses</a>Created for a best selling children's book.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-4" data-type="video">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Wearing-his-Uniform.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Miguel wearing his Uniform</a>For an international add campaign.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-5" data-type="web illustration">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-with-his-wife-Paula.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Miguel Malvar with his wife Paula</a>Classic retro style illustration.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-6" data-type="illustration">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href=""><img src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Centenary.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="">Custom Illustration</a>For an international ad campaign.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-7" data-type="illustration">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href=""><img src="{{ asset('gallery_img/gallery_1n2/Emilio-Aguinaldo-Centenary.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="">Emilio Aguinaldo Centenary</a>For an international ad campaign.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-8" data-type="illustration">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href=""><img src="{{ asset('gallery_img/gallery_1n2/Silver-finial.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="">Silver Finial for Salakot</a>For an international ad campaign.</span>
                    </li>

                    <h3>Gallery 3</h3>

                    <!-- Gallery 3 Items -->
                    <li class="span3 gallery-item" data-id="id-9" data-type="illustration design">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_3/1965-Malvar-Centennial-Commemorative-Medallions.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="#">Centennial Commorative Medallions</a>Creative storyboard illustration</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-10" data-type="design">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_3/2015-Malvar-Sesquicentennial-Commemorative-Coins.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Sesquicientennial Coins</a>Regional ad for a local company.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-11" data-type="web video">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_3/Case-of-Coins-and-Medals.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Case of Coins and Medals</a>For an international add campaign.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-12" data-type="design">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_3/Pamana-ni-Miguel-Malvar.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Pamana ni Miguel Malvar</a>For a feature film.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-13" data-type="web design">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/gallery_3/The-Surrender.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">The Surrender</a>For an international add campaign.</span>
                    </li>

                </ul>
            </div>

            <!-- New Section for Hallway Images -->
            <div class="row clearfix no-margin">
                <ul class="gallery-post-grid holder">

                    <h3>Hallway</h3>

                    <li class="span3 gallery-item" data-id="id-14" data-type="illustration">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/hallway/Battle-in-Tayabas.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Battle in Tayabas</a>For a local business.</span>
                    </li>

                    <li class="span3 gallery-item" data-id="id-15" data-type="illustration video">
            <span class="gallery-hover-4col hidden-phone hidden-tablet">
                <span class="gallery-icons">
                </span>
            </span>
                        <a href="gallery-single.htm"><img src="{{ asset('gallery_img/hallway/Malvar-victory-in-the-battle-of-Talisay.jpg') }}" loading="lazy" style="height: 160px; width: 300px" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Malvar Victory in the battle of Talisay</a>For an international add campaign.</span>
                    </li>

                </ul>
            </div>

        </div>

    </div><!-- End Gallery Row -->


</div><!-- End Headline -->

<!-- resources/views/welcome.blade.php -->

<!-- resources/views/welcome.blade.php -->



</div> <!-- End Container -->

<!-- Footer Area
    ================================================== -->

@include('layouts.footer')

<!-- Scroll to Top -->
<div id="toTop" class="hidden-phone hidden-tablet">Back to Top</div>

</body>

<script>
    $(document).ready(function(){
        $("#visitorRatingsCarousel").owlCarousel({
            items: 3, // Display 3 items per slide
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
    });


    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1, // Display 1 items per slide
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        const galleryItems = [
            {
                id: "id-1",
                title: "Battle of Zapote Bridge",
                artist: "Juanito Torres",
                size: "101 x 65 cms",
                type: "Oil on Canvas",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/Battle-of-Zapote-Bridge.jpg') }}"
            },
            {
                id: "id-2",
                title: "General Miguel Malvar fighting on horseback",
                artist: "Othoniel Neri",
                size: "104 x 135 cms",
                type: "Oil on Canvas",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-fighting-on-horseback.jpg') }}"
            },
            {
                id: "id-3",
                title: "General Miguel Malvar Leader of the Masses",
                artist: "Juanito Torres",
                size: "152 x 182.5 cms",
                type: "Oil on Canvas",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/Miguel-malvar-Leader-of-the-Masses.jpg') }}"
            },
            {
                id: "id-4",
                title: "General Miguel Malvar wearing his uniform",
                artist: "Fernando Amorsolo",
                size: "160 x 300 px",
                type: "Illustration",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Wearing-his-Uniform.jpg') }}"
            },
            {
                id: "id-5",
                title: "Miguel Malvar with his Wife Paula",
                artist: "Othoniel M. Neri",
                size: "63 x 70 cms",
                type: "Oil on Canvas",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-with-his-wife-Paula.jpg') }}"
            },
            {
                id: "id-6",
                title: "Hen. Miguel Malvar Centenary",
                artist: "Unknown",
                size: "160 x 300 px",
                type: "Sculpture",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-Centenary.jpg') }}"
            },
            {
                id: "id-7",
                title: "Emilio Aguinaldo Centenary",
                artist: "Unknown",
                size: "160 x 300 px",
                type: "Sculpture",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/Emilio-Aguinaldo-Centenary.jpg') }}"
            },
            {
                id: "id-8",
                title: "Silver Finial for Salakot",
                artist: "Unknown",
                size: "160 x 300 px",
                type: "Artifact",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/Silver-finial.jpg') }}"
            },
            {
                id: "id-9",
                title: "1965 Malvar Centennial Commemorative Medallions",
                artist: "Unknown",
                size: "160 x 300 px",
                type: "Artifact",
                imageUrl: "{{ asset('gallery_img/gallery_3/1965-Malvar-Centennial-Commemorative-Medallions.jpg') }}"
            },
            {
                id: "id-10",
                title: "2015 Malvar Sesquicentennial Commemorative Coins",
                artist: "Unknown",
                size: "160 x 300 px",
                type: "Artifact",
                imageUrl: "{{ asset('gallery_img/gallery_3/2015-Malvar-Sesquicentennial-Commemorative-Coins.jpg') }}"
            },
            {
                id: "id-11",
                title: "Case of Coins and Medals",
                artist: "Unknown",
                size: "160 x 300 px",
                type: "Artifact",
                imageUrl: "{{ asset('gallery_img/gallery_3/Case-of-Coins-and-Medals.jpg') }}"
            },
            {
                id: "id-12",
                title: "Pamana ni Hen. Miguel Malvar",
                artist: "Unknown",
                size: "160 x 300 px",
                type: "Gravestone",
                imageUrl: "{{ asset('gallery_img/gallery_3/Pamana-ni-Miguel-Malvar.jpg') }}"
            },
            {
                id: "id-13",
                title: "The Surrender",
                artist: "Ka-Leon",
                size: "109 x 184.5 cms",
                type: "Oil on Canvas",
                imageUrl: "{{ asset('gallery_img/gallery_3/The-Surrender.jpg') }}"
            },
            {
                id: "id-14",
                title: "Battle in Tayabas",
                artist: "Carlos Valino",
                size: "101 x 182 cms",
                type: "Oil on Canvas",
                imageUrl: "{{ asset('gallery_img/hallway/Battle-in-Tayabas.jpg') }}"
            },
            {
                id: "id-15",
                title: "General Miguel Malvar's victory in the battle of Talisay",
                artist: "Othoniel M. Neri",
                size: "855 x 322 cms",
                type: "Oil on Canvas",
                imageUrl: "{{ asset('gallery_img/hallway/Malvar-victory-in-the-battle-of-Talisay.jpg') }}"
            },
            {
                id: "id-16",
                title: "General Gregorio del Pilar at the Battle of Pasong Tirad",
                artist: "Othoniel Neri",
                size: "101 x 65 cms",
                type: "Illustration",
                imageUrl: "{{ asset('gallery_img/gallery_1n2/General-Gregorio-del-Pilar-at-the-Battle-of-Pasong-Tirad.jpg') }}"
            }
        ];

        galleryItems.forEach(item => {
            $(`li.gallery-item[data-id="${item.id}"]`).click(function (e) {
                e.preventDefault(); // Prevent default action

                // Show SweetAlert with the information
                Swal.fire({
                    title: item.title,
                    html: `<strong>Artist:</strong> ${item.artist || 'N/A'}<br>` +
                        `<strong>Size:</strong> ${item.size || 'N/A'}<br>` +
                        `<strong>Type:</strong> ${item.type || 'N/A'}`,
                    imageUrl: item.imageUrl,
                    confirmButtonText: 'Close',
                    confirmButtonColor: '#97CC70', // Button color
                    customClass: {
                        container: 'swal-container', // Custom class for container
                        popup: 'swal-popup', // Custom class for popup
                        title: 'swal-title', // Custom class for title
                        content: 'swal-content', // Custom class for content
                        confirmButton: 'swal-confirm-button' // Custom class for confirm button
                    }
                });
            });
        });
    });
</script>

<style>
    /* Custom styles for SweetAlert */
    .swal-container {
        background-color: #ffffff; /* Background color for the SweetAlert container */
    }
    .swal-popup {
        border-radius: 10px; /* Rounded corners for the popup */
    }
    /*.swal-title {*/
    /*    color: #97CC70; !* Title color *!*/
    /*}*/
    .swal-content {
        color: #333333; /* Content color */
    }
    .swal-confirm-button {
        background-color: #97CC70; /* Confirm button color */
        border: none;
        color: #ffffff; /* Text color on the confirm button */
    }
</style>

</html>
