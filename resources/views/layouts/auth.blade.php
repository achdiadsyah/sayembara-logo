<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    
    @stack('head-script')
    
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9 my-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg-6" style="background: url('{{asset('assets/img/auth-bg.png')}}'); background-position: center; background-size: cover;">
                                <div class="text-center text-white p-4">
                                    <img src="{{asset('assets/img/icon.png')}}" alt="Logo-old" width="80px">
                                    <h2>Sayembara Logo</h2>
                                    <h6>Dayah Ruhul Islam Anak Bangsa</h6>
                                </div>
                            </div>
                            @yield('content')
                            
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

    @stack('foot-script')

</body>
</html>