@extends('web.layouts.app')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{url('about')}}"><i class="fa fa-home"></i> Home</a>
                        <span>About</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Section Begin -->
    <section class="about-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="about-pic set-bg" data-setbg="{{$about_banner->getImage()}}">
                        <a href="https://www.youtube.com/watch?v=hxADTEJalRw&list=WL&index=49&t=0s" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Capturing the moments that captivate your heart</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing, tempor incididunt ut labore et dolore
                                magna aliqua. Risus commodo viverra maecenas accumsan lacus vel facilisis. All these
                                taglines are owned by their respective owners, and we do not have any copyright on them.
                            </p>
                        </div>
                        <div class="at-list">
                            <div class="al-item">
                                <div class="al-pic">
                                    <img src="img/about/list-1.png" alt="">
                                </div>
                                <div class="al-text">
                                    <h5>Professionalism</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                        gravida.</p>
                                </div>
                            </div>
                            <div class="al-item">
                                <div class="al-pic">
                                    <img src="img/about/list-2.png" alt="">
                                </div>
                                <div class="al-text">
                                    <h5>Individual approach</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                        gravida.</p>
                                </div>
                            </div>
                            <div class="al-item">
                                <div class="al-pic">
                                    <img src="img/about/list-3.png" alt="">
                                </div>
                                <div class="al-text">
                                    <h5>Flexible Schedule</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                        gravida.</p>
                                </div>
                            </div>
                            <div class="al-item">
                                <div class="al-pic">
                                    <img src="img/about/list-4.png" alt="">
                                </div>
                                <div class="al-text">
                                    <h5>Experience</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                        gravida.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title">
                        <h2>Our team</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="right-btn">
                        <a href="#" class="primary-btn">Appointment</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($team as $team)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-item">
                        <img class="set bg" src="{{$team->getPartnerImage()}}" alt="" >
                        <div class="ti-text">
                            <h5>{{$team->title}}</h5>
                            <span>{{$team->excerpt}}</span>
                            <div class="ti-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Cta Section Begin -->
    <section class="cta-section spad image-clean img-fluid set-bg" data-setbg="{{$promote->getImage()}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-text">
                        <h2>{{$promote->title}}</h2>
                        <p>{{$promote->content}}</p>
                        <a href="#" class="primary-btn">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cta Section End -->

    <!-- Testimoial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>What cilent say?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br /> tempor
                            incididunt ut labore et dolore.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($testimonials as $testimonials)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="testimonial-item">
                        <div class="ti-author">
                            <div class="ta-pic">
                                <img src="{{$testimonials->getTestimonialImage()}}" alt="">
                            </div>
                            <div class="ta-text">
                                <h5>{{$testimonials->title}}</h5>
                                <span>@filder_muko</span>
                            </div>
                        </div>
                        <p>{{$testimonials->content}}</p>
                    </div>
                </div>
                @endforeach
        </div>
    </section>
    <!-- Testimonial Section End -->




@endsection
