@extends('web.layouts.app')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Portfolio</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Portfolio Section Begin -->
    <section class="portfolio-section portfolio-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Our latest works</h2>
                    </div>
                    <div class="filter-controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($category_title as $category)
                                <li data-filter=".{{$category->id}}">{{$category->title}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="portfolio-filter">
                        @foreach($gallery as $gallery)
                            <div class="pf-item {{$gallery->style}} {{$gallery->template_data}}" data-setbg="{{$gallery->getGalleryFile()}}">
                                <a href="{{$gallery->getGalleryFile()}}" class="pf-icon image-popup"><span class="icon_plus"></span></a>
                                <div class="pf-text">
                                    <h4>{{$gallery->title}}</h4>
                                    <span>{{$gallery->template_data}}</span>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="load-more-btn portfolio-btn">
            <a href="#">Load More</a>
        </div>
    </section>
    <!-- Portfolio Section End -->




@endsection
