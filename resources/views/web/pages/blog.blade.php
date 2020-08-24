@extends('web.layouts.app')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @foreach($blog as $blog)
                    <div class="blog-item">
                        <div class="bi-pic">
                            <img class="set bg" height="280" width="400" src="{{$blog->getNewsImage()}}" alt="">
                        </div>
                        <div class="bi-text">
                            <div class="label">{{$blog->type}}</div>
                            <h5><a href="{{url('blog-details/'.$blog->slug)}}">{{$blog->title}}</a>
                            </h5>
                            <ul>
                                <li>by <span>Admin</span></li>
                                <li>Aug,15, 2019</li>
                                <li>20 Comment</li>
                            </ul>
                            <p>{{str_limit($blog->content,200)}}</p>
                        </div>
                    </div>
                    @endforeach

                    <div class="blog-pagination">

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blog-sidebar">
                        <div class="bs-item s-mb">
                            <h5>Feature posts</h5>
                            <div class="bi-feature-post">
                                @foreach($blogs as $blog)
                                <a href="#" class="fp-item">
                                    <div class="fp-pic">
                                        <img height="70" WIDTH="80" src="{{$blog->getNewsImage()}}" alt="">
                                    </div>
                                    <div class="fp-text">
                                        <h6>{{$blog->title}}</h6>
                                        <span>{{$blog->created_at}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="bs-item s-mb">
                            <h5>Subscribe</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor.</p>
                            <div class="bi-subscribe">
                                <form action="#">
                                    <input type="text" placeholder="Name">
                                    <input type="text" placeholder="Email">
                                    <button type="submit" class="site-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="bs-item">
                            <h5>Instagram</h5>
                            <div class="bi-insta">
                                <img src="img/blog/insta-1.jpg" alt="">
                                <img src="img/blog/insta-2.jpg" alt="">
                                <img src="img/blog/insta-3.jpg" alt="">
                                <img src="img/blog/insta-4.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    @endsection
