<header class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo">
                    <a href="#">
                        {{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}}
                    </a>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('about')}}">About</a></li>
                        <li><a href="{{url('services')}}">Services</a></li>
                        <li><a href="{{url('pricing')}}">Pricing</a></li>
                        <li><a href="{{url('portfolio')}}">Portfolio</a></li>
                        <li><a href="{{url('blog')}}">Blog</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./gallery.html">Gallery</a></li>
                                <li><a href="./portfolio-details.html">Portfolio Details</a></li>
                                <li><a href="{{url('blog-details')}}">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('contact')}}">Contact</a></li>
                    </ul>
                </nav>
                <div class="top-search search-switch">
                    <i class="fa fa-search"></i>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </div>
</header>
<script>
    function selectedProvince(){
        $.ajax({
            method:"GET",
            url:"{{url('ajax/selected_province')}}",
            success:function(response){


            }
        })
    }
</script>
