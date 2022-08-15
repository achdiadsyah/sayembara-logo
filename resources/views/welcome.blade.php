<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sayembara Logo, Dayah Ruhul Islam Anak Bangsa">
        <meta name="keywords" content="riab, ruhulislam, anak bangsa">
        <meta name="author" content="Made By Ryan Achdiadsyah">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link href="{{asset('assets/js/plugins/bootsnav_files/skins/color.css')}}" rel="stylesheet">
        <link href="{{asset('assets/js/plugins/bootsnav_files/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('assets/js/plugins/bootsnav_files/css/bootsnav.css')}}" rel="stylesheet">
        <link href="{{asset('assets/js/plugins/bootsnav_files/css/overwrite.css')}}" rel="stylesheet">
        <link href="{{asset('assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    </head>
    <body>

        <div class="page-preloader">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>

        <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#brand">
                        <img src="{{asset('assets/img/logo.png')}}" width="150px" alt="logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a data-toggle="modal" data-target="#showSyarat">Syarat dan Ketentuan</a>
                        </li>
                        @if (Route::has('login'))
                        @auth
                        <li><a href="{{url('/home')}}">Portal Dashboard</a></li>
                        @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>

        <section id="home">
            <div class="container">
                <div class="row">
                    <!-- Introduction -->
                    <div class="col-md-12 caption">
                        <h1>SAYEMBARA LOGO</h1>
                        <h2> 
                            <span class="animated-text"></span>
                            <span class="typed-cursor"></span>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
    
        <footer>
            <div class="container">
                <div class="row">
                    <div class="footer-caption">
                        <h5 class="pull-left">RIAB, &copy;<?= date('Y'); ?> All rights reserved</h5>
                        <ul class="liste-unstyled pull-right">
                            <li><a href="https://www.facebook.com/ruhulislamanakbangsa"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/ruhulislamanakbangsa97"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <div class="modal fade" id="showSyarat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        @include('_users.list-syarat')
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalPoster" aria-hidden="true">
            <div class="modal-dialog" style="margin-top: 140px !important;" role="document">
                <div class="text-center" style="background-color: transparent !important;  border: 0px !important">
                    <img src="{{asset('assets/img/poster.jpg')}}" alt="poster" width="350px">
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{asset('assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/bootsnav_files/js/bootsnav.js')}}"></script>
        <script src="{{asset('assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
