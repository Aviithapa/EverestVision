@extends('web.layouts.app')

@section('content')
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            @foreach($banners as $banner)
            <div class="hs-item set-bg" data-setbg="{{$banner->getImage()}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hs-text">
                                <h2>Photography Studio</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et<br /> dolore magna aliqua. Quis ipsum suspendisse ultrices
                                    gravida accumsan lacus vel facilisis.</p>
                                <a href="#" class="primary-btn">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </section>


    <section class="services-section spad">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-item">
                        <img src="{{$service->getServiceImage()}}" alt="">
                        <h3>{{$service->title}}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>


    <section class="categories-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title">
                        <h2>Categories</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do<br /> eiusmod tempor
                            incididunt ut labore et dolore.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="right-btn"><a href="#" class="primary-btn">VIew all</a></div>
                </div>
            </div>
            <div class="categories-slider owl-carousel">
                @foreach($category as $category)
                <div class="cs-item">
                    <div class="cs-pic set-bg" data-setbg="{{$category->getPostImage()}}"></div>
                    <div class="cs-text">
                        <h4>{{$category->title}}</h4>
                        <span>120 pictures</span>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </section>

    <section class="portfolio-section spad">
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
        </div>
        <div class="load-more-btn">
            <a href="{{url('portfolio ')}}">Load More</a>
        </div>
    </section>


    <div id="myModal" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
<?php
           $popupImage =getSiteSetting('popup_image',true);
?>
            <div class="modal-content img-fluid">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <img src="{{$popupImage?$popupImage:imageNotFound()}}"  alt="fmtc" width="100%">
            </div>

        </div>
    </div>


@endsection
@push('scripts')
    @if($popupImage)
    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
    @endif
    @endpush
