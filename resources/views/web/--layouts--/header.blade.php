
<div class="py-2 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md-5 pr-4 d-flex topper align-items-center">
                        <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                        <span class="text">{{getSiteSetting('location') != null? getSiteSetting('location'): ''}}</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">{{getSiteSetting('email') != null? getSiteSetting('email'): ''}}</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">{{getSiteSetting('social_phone') != null? getSiteSetting('social_phone'): ''}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <a class="navbar-brand" href="{{url('/')}}">{{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link pl-0">Home</a></li>
                <li class="nav-item"><a href="{{url('about')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{url('/teachers')}}" class="nav-link">Teacher</a></li>
                <li class="nav-item"><a href="{{url('courses')}}" class="nav-link">Courses</a></li>
                <li class="nav-item"><a href="{{url('pricing')}}" class="nav-link">Pricing</a></li>
                <li class="nav-item"><a href="{{url('blog')}}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{url('contact')}}" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->