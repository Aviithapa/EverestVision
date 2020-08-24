<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{getSiteSetting('location') != null? getSiteSetting('location'): ''}}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{getSiteSetting('social_phone') != null? getSiteSetting('social_phone'): ''}}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{getSiteSetting('email') != null? getSiteSetting('email'): ''}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Recent Blog</h2>
                    @foreach($blogs as $key=>$blog)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{$blog->getNewsImage()}});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">{{$blog->title}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span>{{ $blog->created_at->format('M d Y') }}</a></div>
                                {{--<div><a href="#"><span class="icon-person"></span> Admin</a></div>--}}
                                {{--<div><a href="#"><span class="icon-chat"></span> 19</a></div>--}}
                            </div>
                        </div>
                    </div>
                        @if($key+1 == 2)
                            @break
                            @endif
                    @endforeach

                </div>

            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                        <li><a href="{{url('/about')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                        <li><a href="{{url('teachers')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Teachers</a></li>
                        <li><a href="{{url('courses')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Courses</a></li>
                        <li><a href="{{url('contact')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Subscribe Us!</h2>
                    <form action="#" class="subscribe-form">
                        <div class="form-group">
                            <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="form-control submit px-3">
                        </div>
                    </form>
                </div>
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="{{getSiteSetting('social_twitter') != null? getSiteSetting('social_twitter'): '#'}}"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{getSiteSetting('social_fb') != null? getSiteSetting('social_fb'): '#'}}"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{getSiteSetting('social_instagram') != null? getSiteSetting('social_instagram'): '#'}}"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered By <i class="icon-heart" aria-hidden="true"></i> by <a href="http://elitekod.com" target="_blank">Elitekod</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

