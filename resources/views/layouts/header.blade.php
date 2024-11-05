<div class="row header"><!-- Begin Header -->

    <!-- Logo
    ================================================== -->
    <div class="span5 logo">
        <a href="{{url('/')}}"><img src="{{ asset('NEW CONTENT/malvar x app black.png') }}" style="height: 150px; width: 150px"alt="" /></a>
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

                <li class="{{ $currentRoute == 'event' ? 'active' : '' }}">
                    <a href="{{ route('event') }}">Events</a>
                </li>

                <li class="{{ $currentRoute == 'contact' ? 'active' : '' }}">
                    <a href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>

        </div>

        <!-- Mobile Nav
        ================================================== -->
        <form action="#" id="mobile-nav" class="visible-phone">
            <div class="mobile-nav-select">
                <select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                    <option value="">Navigate...</option>
                    <option value="{{ url('/') }}">Home</option>
                    <option value="{{ url('gallery') }}">- Gallery</option>
                    <option value="{{ route('event') }}">- Events</option>
                    <option value="{{ url('contact') }}">- Contact</option>
                    <option value="{{ route('login') }}">Login</option>
                </select>
            </div>
        </form>

    </div>

</div><!-- End Header -->

<div class="row headline"><!-- Begin Headline -->
