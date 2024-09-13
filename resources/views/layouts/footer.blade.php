<div class="footer-container"><!-- Begin Footer -->
    <div class="container">
        <div class="row footer-row">
            <div class="span3 footer-col">
                <h5>About Us</h5>
                <img src="{{asset('new_logo.png')}}" style="width: 100px; height: 100px" alt="Piccolo" /><br /><br />
                <address>
                    <strong>Design Team</strong><br />
                    446R+2WV, Gov. Malvar St<br />
                    Poblacion 1, Santo Tomas, 4234 Batangas<br />
                </address>
                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/museonimiguelmalvar" class="social-icon facebook"></a></li>
                </ul>
            </div>
            <div class="span3 footer-col">
                <h5>Contact Us</h5>
                <address>
                    <strong>Museo ni Miguel Malvar</strong><br>
                    446R+2WV, Gov. Malvar St<br>
                    Poblacion 1, Santo Tomas, 4234 Batangas<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
            </div>
            <div class="span3 footer-col">
                <h5>Email Us</h5>
                <form action="#" method="post">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email address" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="span3 footer-col">
                <h5>Gallery</h5>
                <ul class="img-feed">
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/GALLERY 1&2/Battle of Zapote Bridge/battale_of_zapote.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/GALLERY 1&2/Bronilla/bronilla.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/GALLERY 1&2/Gen. Miguel Malvar fighting on horseback/horseback.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/GALLERY 1&2/Gen. Miguel malvar Leader of the Masses/leader_of_masses.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/GALLERY 1&2/Gen. Miguel Malvar on Horseback/hoseback_figure.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/GALLERY 1&2/Hen. Miguel Malvar Centenary/centenary.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/GALLERY 1&2/Miguel Malvar with his wife Paula/his_wife_paula.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/GALLERY 3/The Surrender/the_surrender.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/HALLWAY/Battle in Tayabas/battle_of_tayabas.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="{{ asset('Assets/ARTIFACTS/HALLWAY/General Miguel Malvar_s victory in the battle of Talisay/victory_talisay.jpg') }}"  style="height: 60px; width: 60px" alt="Image Feed"></a></li>

                </ul>
            </div>
        </div>

        <div class="row"><!-- Begin Sub Footer -->
            <div class="span12 footer-col footer-sub">
                <div class="row no-margin">
                    <div class="span6"><span class="left">Copyright 2024 Artifact Explorer. All rights reserved.</span></div>
                    <div class="span6">
                            <span class="right">
                            <a href="{{url('/')}}">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="{{route('gallery')}}">Gallery</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/museonimiguelmalvar/">Contact</a>
                            </span>
                    </div>
                </div>
            </div>
        </div><!-- End Sub Footer -->

    </div>
</div><!-- End Footer -->
