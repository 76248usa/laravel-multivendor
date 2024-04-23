<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Online Store - Register Account</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
   
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg ') }}" />
   
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3 ') }}" />
</head>

<body>
    

    @include('frontend.body.header')

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                     <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-12 m-auto">
                        <div class="row">
                            <div class="heading_s1">
                                <img class="border-radius-15" src="{{ asset('frontend/assets/imgs/page/reset_password.svg ') }}" alt="" />
                                <h2 class="mb-15 mt-15">Email Password reset</h2>
                                <p class="mb-30">Let us know your email address and we will email you a password reset link.</p>
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">

                                        {{-- <form method="POST" action={{ route('password.email') }}>
                                            <div class="form-group">
                                                <input type="email" required="" name="email" id="email" placeholder="Email *" />
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Email Password Reset</button>
                                            </div>
                                        </form> --}}




    <form  class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
            @csrf

    <div class="alert alert-info alert-dismissible fade show" role="alert">
     Forgot your password?<strong> No problem.</strong> Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="form-group mb-3">
        <div class="col-xs-12">
            <input class="form-control"  id="email" type="email" name="email"  required="" placeholder="Email">
        </div>
    </div>
    
                                <div class="form-group pb-2 text-center row mt-3">
             <div class="col-12">
             <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
            </div>
        </div>
    </form>

                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
   
    @include('frontend.body.footer')
   
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="assets/imgs/theme/loading.gif" alt="" />
                </div>
            </div>
        </div>
    </div>
   
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js ') }}"></script>

    <script src="{{ asset('frontend/assets/js/main.js?v=5.3 ') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3 ') }}"></script>
</body>

</html>
