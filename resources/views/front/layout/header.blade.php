<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- ========== Page Title ========== -->
    <title>Cookforme</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('public/front') }}/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('public/front') }}/css/bootstrap.min.css" rel="stylesheet" />
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet" />
    
    
    <link href="{{ asset('public/front') }}/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('public/front') }}/css/flaticon-set.css" rel="stylesheet" />
    <link href="{{ asset('public/front') }}/css/magnific-popup.css" rel="stylesheet" />
    <link href="{{ asset('public/front') }}/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{ asset('public/front') }}/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="{{ asset('public/front') }}/css/animate.css" rel="stylesheet" />
    <link href="{{ asset('public/front') }}/css/bootsnav.css" rel="stylesheet" />
    <link href="{{ asset('public/front') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('public/front') }}/css/responsive.css" rel="stylesheet" /> 
    <link href="{{ asset('public/front') }}/css/cust.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    <link href="{{ asset('public/front') }}/fonts/Peace Sans Webfont.ttf" rel="stylesheet" />
 

    <!-- ========== Google Fonts ========== -->
   
</head>

<body>

    <!-- Preloader Start -->
<!--    <div class="se-pre-con"></div>-->
    <!-- Preloader Ends -->

    <!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area inline bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-8 address-info text-left">
                    <div class="info box">
                        <ul>
                            <li class="top_logo_new">
                                <a class="navbar-brand top_logo" href="{{url('/')}}">
                                    <img src="{{ asset('public/front') }}/img/logo-new.png"  alt="Logo">
                                </a>
                            </li>
                            @php 
                               $site_info = App\Helpers\Helper::SiteEmailContact();
                            @endphp
                            <li>
                                <i class="fas fa-envelope-open"></i> {{$site_info['site_email']}}
                            </li>
                            <li>
                                <i class="fas fa-phone"></i> <a class="mobilesOnly" href="tel:0041798900860">{{$site_info['site_contact']}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 social text-right">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/CookForMeGeneve/"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/cook_for_me_geneve/"><i class="fab fa-instagram"></i></a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed dark no-background bootsnav inc-border active-border">

            <!-- Start Top Search -->
<!--
            <div class="container">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" name="text" class="form-control" placeholder="Search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
-->
            <!-- End Top Search -->

            <div class="container">

                <!-- Start Atribute Navigation -->
<!--
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                      
                    </ul>
                </div>        
-->
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
<a class="navbar-brand cusre__dsgvdrf" href="{{url('/')}}">
                      <h1>Cook For Me</h1>
                    </a>
                  
                </div>
                <!-- End Header Navigation -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                            <li><a href="{{route('meals')}}">{{ __('messages.meals') }}</a></li>
                            <li><a href="{{route('gift')}}">Gifts</a></li>
                            @if(Auth::user())
                             <li ><a href="{{route('my-profile')}}">{{ __('messages.my_account') }}</a></li>
                             <li ><a href="{{route('customer-logout')}}">{{ __('messages.Logout') }}</a></li>
                             @else
                             <li ><a href="{{route('customer-login')}}">{{ __('messages.login') }}</a></li>
                              <li class="sign_up_cl"><a href="{{ url('join-now') }}">{{ __('messages.signup') }}</a></li>
                             @endif
                                 <li class="dropdown language_sec_header">
                                    @if(App::getLocale()=='en')
                                     <a href="javascript:void(0);" class="dropdown-toggle active" data-toggle="dropdown">
                                         <span class="flag-icon flag-icon-gb"></span>&nbsp;English</a>
                                    @elseif(App::getLocale()=='fr')
                                    <a href="javascript:void(0);" class="dropdown-toggle active" data-toggle="dropdown">
                                         <span class="flag-icon flag-icon-fr"></span>&nbsp;French</a>
                                    @elseif(App::getLocale()=='it')
                                    <a href="javascript:void(0);" class="dropdown-toggle active" data-toggle="dropdown">
                                         <span class="flag-icon flag-icon-it"></span>&nbsp;Italian</a>
                                    @elseif(App::getLocale()=='de')
                                     <a href="javascript:void(0);" class="dropdown-toggle active" data-toggle="dropdown">
                                         <span class="flag-icon flag-icon-de"></span>&nbsp;German</a>
                                    @endif
                                     <ul class="dropdown-menu dropdown-menu-right">
                                         <li><a href="{{ route('lang.switch', 'en') }}"><span class="flag-icon flag-icon-gb"></span>&nbsp;English</a></li>
                                         <li><a href="{{ route('lang.switch', 'fr') }}"><span class="flag-icon flag-icon-fr"></span>&nbsp;French</a></li>
                                         <li><a href="{{ route('lang.switch', 'it') }}"><span class="flag-icon flag-icon-it"></span>&nbsp;Italian</a></li>
                                         <li><a href="{{ route('lang.switch', 'de') }}"><span class="flag-icon flag-icon-de"></span>&nbsp;German</a></li>
                                     </ul>
                                 </li>
                          </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header -->
   
 