<div class="row header"><!-- Begin Header -->

    <!-- Logo
    ================================================== -->
    <div class="span5 logo">
        <a href="index.htm"><img src="{{ asset('img/Logo.png') }}" style="height: 150px; width: 150px"alt="" /></a>
        <h5>Museo ni Miguel Malvar </h5>
    </div>

    <!-- Main Navigation
    ================================================== -->
    <div class="span7 navigation">
        <div class="navbar hidden-phone">

            @php
                $currentRoute = Request::path();
            @endphp

            <ul class="nav">
                <li class="{{ $currentRoute == '/' ? 'active' : '' }}">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="{{ $currentRoute == 'gallery' ? 'active' : '' }}">
                    <a href="{{ url('gallery') }}">Gallery</a>
                </li>
                <li class="{{ $currentRoute == 'contact' ? 'active' : '' }}">
                    <a href="{{ url('contact') }}">Contact</a>
                </li>
                <li class="{{ $currentRoute == 'login' ? 'active' : '' }}">
                    <a href="{{ route('login') }}">Login</a>
                </li>
            </ul>

        </div>

        <!-- Mobile Nav
        ================================================== -->
        <form action="#" id="mobile-nav" class="visible-phone">
            <div class="mobile-nav-select">
                <select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                    <option value="">Navigate...</option>
                    <option value="index.htm">Home</option>
                    <option value="index.htm">- Full Page</option>
                    <option value="index-gallery.htm">- Gallery Only</option>
                    <option value="index-slider.htm">- Slider Only</option>
                    <option value="features.htm">Features</option>
                    <option value="page-full-width.htm">Pages</option>
                    <option value="page-full-width.htm">- Full Width</option>
                    <option value="page-right-sidebar.htm">- Right Sidebar</option>
                    <option value="page-left-sidebar.htm">- Left Sidebar</option>
                    <option value="page-double-sidebar.htm">- Double Sidebar</option>
                    <option value="gallery-4col.htm">Gallery</option>
                    <option value="gallery-3col.htm">- 3 Column</option>
                    <option value="gallery-4col.htm">- 4 Column</option>
                    <option value="gallery-6col.htm">- 6 Column</option>
                    <option value="gallery-4col-circle.htm">- Gallery 4 Col Round</option>
                    <option value="gallery-single.htm">- Gallery Single</option>
                    <option value="blog-style1.htm">Blog</option>
                    <option value="blog-style1.htm">- Blog Style 1</option>
                    <option value="blog-style2.htm">- Blog Style 2</option>
                    <option value="blog-style3.htm">- Blog Style 3</option>
                    <option value="blog-style4.htm">- Blog Style 4</option>
                    <option value="blog-single.htm">- Blog Single</option>
                    <option value="page-contact.htm">Contact</option>
                </select>
            </div>
        </form>

    </div>

</div><!-- End Header -->

<div class="row headline"><!-- Begin Headline -->
