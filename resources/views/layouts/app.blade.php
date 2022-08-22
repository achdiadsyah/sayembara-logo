<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - {{$title ? $title : ''}}</title>

    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/icon.png')}}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/costum.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.magnify.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/filepond.css')}}" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
        
    @stack('head-script')
</head>

<body id="page-top">
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
                <div class="sidebar-brand-text mx-3">Ruhul Islam</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if(auth()->user()->is_admin == 0)

            <li class="nav-item {{ (request()->is('syarat-perlombaan')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('syarat')}}">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Syarat Perlombaan</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('upload-karya')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('karya')}}">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Upload Karya</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('info')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('info')}}">
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Layanan Informasi</span>
                </a>
            </li>

            @else

            <li class="nav-item {{ (request()->is('peserta-baru*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('peserta-baru')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Peserta Baru</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('need-review*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('need-review')}}">
                    <i class="fas fa-fw fa-th"></i>
                    <span>Review Karya</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('on-review*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('on-review')}}">
                    <i class="fas fa-fw fa-th"></i>
                    <span>Lulus Review</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('assesment*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('assesment')}}">
                    <i class="fas fa-fw fa-th"></i>
                    <span>Finalis</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item {{ (request()->is('passed')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('passed')}}">
                    <i class="fas fa-fw fa-th"></i>
                    <span>Passed</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('un-passed*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('un-passed')}}">
                    <i class="fas fa-fw fa-th"></i>
                    <span>Unpassed</span>
                </a>
            </li>

            @endif

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ? 'Salam, '.Auth::user()->name : 'Salam, ' }}
                                <br>
                                {{ Auth::user()->is_admin == 1 ? "Login as Admin" : "Login as User"}}
                                </span>
                                <img class="img-profile rounded-circle" src="{{'https://ui-avatars.com/api/?name='.auth()->user()->email}}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

            <footer class="sticky-footer bg-white py-3">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ruhul Islam Anak Bangsa</span>
                        <div class="mt-1">Made with <i class="fas fa-heart text-danger"></i> By <a href="https://instagram.com/achdiadsyah" target="_blank"> Ryan Achdiadsyah</a></div>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnify.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script>
    $('[data-magnify]').magnify({
        headerToolbar: [
        'minimize',
        'maximize',
        'close'
        ],
        footerToolbar: [
        'zoomIn',
        'zoomOut',
        'fullscreen',
        'actualSize',
        'rotateLeft',
        'rotateRight',
        ],
        modalWidth: 1280,
        modalHeight: 720,
    });
    </script>

    @stack('foot-script')
    
</body>
</html>
