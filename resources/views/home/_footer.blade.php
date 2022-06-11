<!--/ footer Star /-->
<section class="section-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">{{$setting->company}}</h3>
                    </div>
                    <div class="w-body-a">
                        <p class="w-text-a color-text-a">
                            {{$setting->title}}
                        </p>
                    </div>
                    <div class="w-footer-a">
                        <ul class="list-unstyled">
                            <li class="color-a">
                                <span class="color-text-a">Phone .</span> {{$setting->phone}}</li>
                            <li class="color-a">
                                <span class="color-text-a">Email .</span> {{$setting->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">The Company</h3>
                    </div>
                    <div class="w-body-a">
                        <div class="w-body-a">
                            <ul class="list-unstyled">
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Site Map</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Legal</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Agent Admin</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Careers</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $parentCategories=\App\Http\Controllers\HomeController::categoryList();
            @endphp
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">Kategoriler</h3>
                    </div>
                    <div class="w-body-a">
                        <ul class="list-unstyled">
                            @foreach($parentCategories as $rs)
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="{{route('categorypackages',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="/">Home</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('aboutus')}}">Hakkımızda</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('contact')}}">İletişim</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('faq')}}">SSS</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('references')}}">Referanslarımız</a>
                        </li>
                    </ul>
                </nav>
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{$setting->facebook}}">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$setting->twitter}}">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$setting->instagram}}">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a">Seyahat Acentesi</span> All Rights Reserved.
                    </p>
                </div>
                <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
                    -->
                    Designed by 
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="{{ asset('assets')}}/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('assets')}}/lib/jquery/jquery-migrate.min.js"></script>
<script src="{{ asset('assets')}}/lib/popper/popper.min.js"></script>
<script src="{{ asset('assets')}}/lib/bootstrap/{{ asset('assets')}}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets')}}/lib/easing/easing.min.js"></script>
<script src="{{ asset('assets')}}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('assets')}}/lib/scrollreveal/scrollreveal.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('assets')}}/js/main.js"></script>

</body>
</html>
