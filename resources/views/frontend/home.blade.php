<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Wall Street Reading List</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ThemeZaa">
        <!-- description -->
        <meta name="description" content="POFO is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose agency and portfolio HTML5 template with 25 ready home page demos.">
        <!-- keywords -->
        <meta name="keywords" content="creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, coming soon, faq">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('media/frontend/images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('media/frontend/images/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('media/frontend/images/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('media/frontend/images/apple-touch-icon-114x114.png') }}">
        <!-- animation -->
        <link rel="stylesheet" href="{{ asset('css/frontend/animate.css') }}" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.min.css') }}" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="{{ asset('css/frontend/et-line-icons.css') }}" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="{{ asset('css/frontend/font-awesome.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/frontend/themify-icons.css') }}" />
        
        <!-- swiper carousel -->
        <link rel="stylesheet" href="{{ asset('css/frontend/swiper.min.css') }}" />
        <!-- justified gallery  -->
        <link rel="stylesheet" href="{{ asset('css/frontend/justified-gallery.min.css') }}" />
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{ asset('css/frontend/magnific-popup.css') }}" />
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/settings.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/layers.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/navigation.css') }}" />
        <!-- bootsnav -->
        <link rel="stylesheet" href="{{ asset('css/frontend/bootsnav.css') }}" />
        <!-- style -->
        <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}" />
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('css/frontend/responsive.css') }}" />
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->

        <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

        <style>

            p,h6 {
                scrollbar-width: thin;
                scrollbar-color: #1c1c1c transparent;
            }

            p::-webkit-scrollbar, h6::-webkit-scrollbar {
                width: 8px;
            }

            p::-webkit-scrollbar-track, h6::-webkit-scrollbar-track {
            background: transparent;
            }

            p::-webkit-scrollbar-thumb, h6::-webkit-scrollbar-thumb {
                background-color: #1c1c1c;
                border-radius: 20px;
            }

            @media screen and (max-width: 600px){
                .footer-container{
                    flex-direction: column;
                }

                .footer-container-logo{
                    margin-right: 0px !important;
                }
            }

        </style>

        <script>

            $(document).ready(function(){
                let width= $('.book-cover-img').width();
                $('.book-cover-img').height(width+80);
            });

        </script>
        
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav background-white navbar-expand-lg nav-box-width">
                <div class="container-fluid nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto pl-0">
                        <a href="/" title="Pofo" >
                            <img src="{{ asset('media/logos/logo-dark.png') }}" >
                        </a>
                    </div>
                    <!-- end logo -->
                    <div class="col accordion-menu pr-0 pr-md-3">
                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse justify-content-end" id="navbar-collapse-toggle-1">
                            <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                <!-- start menu item -->
                                <li class="dropdown megamenu-fw">
                                    <a href="/" data-toggle="dropdown">Home</a>
                                </li>

                                <li class="dropdown megamenu-fw">
                                    <a href="/about" data-toggle="dropdown">About</a>
                                </li>

                                <li class="dropdown megamenu-fw">
                                    <a href="#" data-toggle="dropdown">Books</a>
                                    <!-- start sub menu -->
                                    <div class="menu-back-div dropdown-menu megamenu-content mega-menu collapse mega-menu-full">
                                        <ul>
                                            <!-- start sub menu column  -->
                                            <li class="mega-menu-column col-lg-3">
                                                <!-- start sub menu item  -->
                                                <ul>
                                                    <li class="dropdown-header">Categories</li>

                                                    @foreach($categories as $category)

                                                        <li><a href="/book/category/{{$category['category']}}">{{$category['category']}}</a></li>

                                                    @endforeach
                                            
                                                </ul>
                                                <!-- end sub menu item  -->
                                            </li>
                                            <!-- end sub menu column -->
                                            <!-- start sub menu column -->
                                            <li class="mega-menu-column col-lg-3">
                                                <!-- start sub menu item  -->
                                                <ul>
                                                    <li class="dropdown-header">Published Date</li>

                                                    @foreach($publishedYears as $publishedYear)

                                                        <li><a href="/book/publishedyear/{{$publishedYear['publishedYear']}}">{{$publishedYear['publishedYear']}}</a></li>

                                                    @endforeach

                                                </ul>
                                                <!-- end sub menu item  -->
                                            </li>
                                        </ul>
                                        <!-- end sub menu -->
                                    </div>
                                </li>

                                <li class="dropdown megamenu-fw">
                                    <a href="/subscribe" data-toggle="dropdown">Subscribe</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto pr-0">
                        <div class="header-searchbar">
                            <a href="#search-header" class="header-search-form"><img src="{{ asset('media/frontend/images/icon-search.png') }}" style="width: 15px; height: 15px; margin: 0px 10px;"></img></a>
                            <!-- search input-->
                            <form id="search-header" method="post" action="{{ url('/search') }}" name="search" class="mfp-hide search-form-result">
                                <div class="search-form position-relative">
                                    <button type="submit" class="fas fa-search close-search search-button"></button>
                                    <input type="text" name="title" class="search-input" placeholder="Enter book title..." autocomplete="off">
                                </div>
                            </form>
                        </div>
                        <div class="header-social-icon d-none d-md-inline-block">
                            <a href="https://www.facebook.com/" title="Facebook" target="_blank" style="margin-right: 20px;"><img src="{{ asset('media/frontend/images/icon-fb-dark.png') }}" style="width: 15px; height: 15px;opacity: .8;"></img></a>
                            <a href="https://twitter.com/" title="Twitter" target="_blank" style="margin-right: 20px;"><img src="{{ asset('media/frontend/images/icon-twitter-dark.png') }}" style="width: 15px; height: 15px;opacity: .8;"></img></a>
                            <a href="https://dribbble.com/" title="Dribbble" target="_blank"><img src="{{ asset('media/frontend/images/icon-dribble-dark.png') }}" style="width: 15px; height: 15x; opacity: .8;"></img></a>                          
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation --> 
        </header>

        {{-- @if (session('error'))
            <div class="alert alert-danger w-100" style="margin: 50px 0px;">
                <button type="button" class="close" data-dismiss="alert" style="margin-left: 10px;">&times;</button>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success w-100">
                <button type="button" class="close" data-dismiss="alert" style="margin-left: 10px;">&times;</button>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif --}}
        <!-- end header -->
        <!-- start blog section -->
        <section class="p-0 wow fadeIn" style="min-height: 100vh;">
            <div class="container-fluid wrapper-div">
                <div class="row blog-post-style4">
                    <div class="col-12 px-3 p-md-0">
                        <ul class="blog-grid blog-4col gutter-small">
                            <li class="grid-sizer"></li>
                            <!-- start blog post item -->
                            @if ( count($books) )
                                @foreach($books as $book)
                                    <li class="grid-item wow fadeInUp">
                                        <figure>
                                            <div class="blog-img bg-extra-dark-gray">
                                                <a href="{{ $book['amazonLink'] }}" target="_blank"><img class="book-cover-img" src="{{ $book['coverLarge'] }}" alt="book-cover"></a>
                                            </div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="blog-hover-box align-bottom">
                                                        <span class="post-author text-extra-small text-medium-gray text-uppercase d-block margin-5px-bottom sm-margin-5px-bottom">{{ $book['publishedYear'] }} | by <a href="{{ $book['amazonLink'] }}" class="text-medium-gray">{{ $book['author'] }}</a></span>
                                                        <h6 class="alt-font d-block text-white-2 font-weight-600 mb-0" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><a href="{{ $book['amazonLink'] }}" class="text-white-2 text-deep-pink-hover" target="_blank">{{ $book['title'] }}</a></h6>
                                                        <p class="text-medium-gray margin-10px-top width-80 md-width-100 blog-hover-text " style="width: 100%; height: 50px; overflow-y: scroll; padding-right: 5px;">{{ $book['description'] }}</p>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </li>
                                @endforeach
                            @else 
                                <li><h3 style="color:#A32424; padding: 50px 0px;">Nothing Found</h3></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end post content -->
        <!-- start footer --> 
        <footer class="footer-classic-dark bg-extra-dark-gray padding-five-bottom sm-padding-30px-bottom">
            <div class="bg-dark-footer padding-50px-tb sm-padding-30px-tb">
                <div>
                    <div class="footer-container" style="display: flex; justify-content: center; align-items: center;">
                        <div class="footer-container-logo" style="margin-right: 50px;">
                            <a href="/"><img src="{{ asset('media/frontend/images/wsrl-light.png') }}"</a>
                        </div>
                        <div style="display: flex; align-items: center;justify-content: center;">
                            <span class="alt-font margin-20px-right">On social networks</span>
                            <div class="social-icon-style-8 d-inline-block vertical-align-middle">
                                <ul class="small-icon mb-0">
                                    <li><a class="facebook text-white-2" href="https://www.facebook.com/" target="_blank"><img src="{{ asset('media/frontend/images/icon-fb.png') }}" style="width: 20px; height: 20px;"></img></a></li>
                                    <li><a class="twitter text-white-2" href="https://twitter.com/" target="_blank"><img src="{{ asset('media/frontend/images/icon-twitter.png') }}" style="width: 20px; height: 20px;"></img></a></li>
                                    <li><a class="google text-white-2" href="https://plus.google.com" target="_blank"><img src="{{ asset('media/frontend/images/icon-googleplus.png') }}" style="width: 20px; height: 20px;"></img></a></li>
                                    <li><a class="instagram text-white-2" href="https://instagram.com/" target="_blank"><img src="{{ asset('media/frontend/images/icon-instagram.png') }}" style="width: 20px; height: 20px;"></img></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-bottom border-top border-color-medium-dark-gray padding-30px-top">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 text-small text-md-center text-center">&COPY; 2020 POFO is Proudly Powered by <a href="#" target="_blank" title="">ThemeZaa</a></div>
                    </div>
                </div>
            </div>
        </footer>

        <a class="scroll-top-arrow" href="javascript:void(0);"><img src="{{ asset('media/frontend/images/icon-scrolltop.png') }}" style="width: 10px; height: 10px;"></img></a>
        
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/modernizr.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/bootstrap.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/skrollr.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/smooth-scroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.appear.js') }}"></script>
        <!-- menu navigation -->
        <script type="text/javascript" src="{{ asset('js/frontend/bootsnav.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.nav.js') }}"></script>
        <!-- animation -->
        <script type="text/javascript" src="{{ asset('js/frontend/wow.min.js') }}"></script>
        <!-- page scroll -->
        <script type="text/javascript" src="{{ asset('js/frontend/page-scroll.js') }}"></script>
        <!-- swiper carousel -->
        <script type="text/javascript" src="{{ asset('js/frontend/swiper.min.js') }}"></script>
        <!-- counter -->
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.count-to.js') }}"></script>
        <!-- parallax -->
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.stellar.js') }}"></script>
        <!-- magnific popup -->
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.magnific-popup.min.js') }}"></script>
        <!-- portfolio with shorting tab -->
        <script type="text/javascript" src="{{ asset('js/frontend/isotope.pkgd.min.js') }}"></script>
        <!-- images loaded -->
        <script type="text/javascript" src="{{ asset('js/frontend/imagesloaded.pkgd.min.js') }}"></script>
        <!-- pull menu -->
        <script type="text/javascript" src="{{ asset('js/frontend/classie.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/hamburger-menu.js') }}"></script>
        <!-- counter  -->
        <script type="text/javascript" src="{{ asset('js/frontend/counter.js') }}"></script>
        <!-- fit video  -->
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.fitvids.js') }}"></script>
        <!-- skill bars  -->
        <script type="text/javascript" src="{{ asset('js/frontend/skill.bars.jquery.js') }}"></script> 
        <!-- justified gallery  -->
        <script type="text/javascript" src="{{ asset('js/frontend/justified-gallery.min.js') }}"></script>
        <!--pie chart-->
        <script type="text/javascript" src="{{ asset('js/frontend/jquery.easypiechart.min.js') }}"></script>
        <!-- instagram -->
        <script type="text/javascript" src="{{ asset('js/frontend/instafeed.min.js') }}"></script>
        <!-- retina -->
        <script type="text/javascript" src="{{ asset('js/frontend/retina.min.js') }}"></script>
        <!-- revolution -->
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/frontend/main.js') }}"></script>
        
    </body>
</html>