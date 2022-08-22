{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ATAR APPLICATION WEB">
    <meta name="author" content="AMAL OTMANE - MEDYOUIN GROUP">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('primary/assets/images/favicon.png') }}">
    <title>ATAR - {{ $title }} MOROCCO WITH FORGEIN EYE</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('primary/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('primary/assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('primary/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('primary/dist/css/pages/dashboard1.css') }}" rel="stylesheet">
    <!-- page css -->
    <link href="{{ asset('primary/dist/css/pages/user-card.css') }}" rel="stylesheet">
    <!-- Popup CSS -->
    <link href="{{ asset('primary/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css') }}"
        rel="stylesheet">
    {{-- Nestable css --}}
    <link href="{{ asset('primary/assets/node_modules/nestable/nestable.css') }}" rel="stylesheet" type="text/css" />
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @stack('styles')
    @livewireStyles
</head>

<body class="{{ Auth::user()->theme }} fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">ATAR</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @livewire('admin.top-header-component')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro">
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <img src="{{ asset('primary/assets/images/users/' . Auth::user()->photo) }}"
                                    alt="user-img" class="img-circle">
                                <span class="hide-menu">{{ Str::of(Auth::user()->name)->before(' ') }}</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin-profile') }}"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                                        <i class="fa fa-power-off"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-small-cap pl-3"> MANAGE CONTENT </li>
                        <li class="@if (request()->routeIs('admin-addcity')) {{ 'active' }} @elseif(request()->routeIs('admin-cities')) {{ 'active' }} @elseif(request()->routeIs('admin-editcity')) {{ 'active' }} @elseif(request()->routeIs('admin-showcity')) {{ 'active' }} @endif"
                            href="{{ route('admin-cities') }}">
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="ti-align-right"></i><span class="hide-menu">Contenu</span>
                            </a>
                            <ul aria-expanded="@if (request()->routeIs('admin-addcity')) {{ 'true' }} @elseif(request()->routeIs('admin-cities')) {{ 'true' }} @elseif(request()->routeIs('admin-editcity')) {{ 'true' }} @elseif(request()->routeIs('admin-showcity')) {{ 'true' }} @endif"
                                class="collapse @if (request()->routeIs('admin-addcity')) {{ 'in' }} @elseif(request()->routeIs('admin-cities')) {{ 'in' }} @elseif(request()->routeIs('admin-editcity')) {{ 'in' }} @elseif(request()->routeIs('admin-showcity')) {{ 'in' }} @endif">
                                <li><a class="@if (request()->routeIs('admin-addcity')) {{ 'active' }} @elseif(request()->routeIs('admin-cities')) {{ 'active' }} @elseif(request()->routeIs('admin-editcity')) {{ 'active' }} @elseif(request()->routeIs('admin-showcity')) {{ 'active' }} @endif"
                                        href="{{ route('admin-cities') }}">Villes</a></li>
                                <li><a class="@if (request()->routeIs('admin-addsite')) {{ 'active' }} @elseif(request()->routeIs('admin-sites')) {{ 'active' }} @elseif(request()->routeIs('admin-editsite')) {{ 'active' }} @elseif(request()->routeIs('admin-showcity')) {{ 'active' }} @endif"
                                        href="{{ route('admin-sites') }}">Repéres</a></li>
                                <li><a href="{{ route('admin-addpath') }}">Parcours</a></li>
                                <li><a href="{{ route('admin-quiz') }}">Quiz</a></li>
                            </ul>
                        </li>


                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="ti-bell"></i><span class="hide-menu">Notifications</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Villes</a></li>
                                <li><a href="form-layout.html">Repéres</a></li>
                                <li><a href="form-addons.html">Parcours</a></li>
                                <li><a href="form-material.html">Quiz</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-mobile"></i><span class="hide-menu">Menus
                                    ATAR</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Villes</a></li>
                                <li><a href="form-layout.html">Repéres</a></li>
                                <li><a href="form-addons.html">Parcours</a></li>
                                <li><a href="form-material.html">Quiz</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="icon-people"></i><span
                                    class="hide-menu">Utilisateurs</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Villes</a></li>
                                <li><a href="form-layout.html">Repéres</a></li>
                                <li><a href="form-addons.html">Parcours</a></li>
                                <li><a href="form-material.html">Quiz</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-receipt"></i><span
                                    class="hide-menu">Paiments</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Villes</a></li>
                                <li><a href="form-layout.html">Repéres</a></li>
                                <li><a href="form-addons.html">Parcours</a></li>
                                <li><a href="form-material.html">Quiz</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-briefcase"></i><span
                                    class="hide-menu">Administrateurs</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Villes</a></li>
                                <li><a href="form-layout.html">Repéres</a></li>
                                <li><a href="form-addons.html">Parcours</a></li>
                                <li><a href="form-material.html">Quiz</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-panel"></i><span
                                    class="hide-menu">Parametres</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Villes</a></li>
                                <li><a href="form-layout.html">Repéres</a></li>
                                <li><a href="form-addons.html">Parcours</a></li>
                                <li><a href="form-material.html">Quiz</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            {{ $slot }}
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                    </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-orange']) }}"
                                    data-skin="skin-orange"
                                    class="orange-theme {{ Auth::user()->theme == 'skin-orange' ? 'working' : '' }}">2</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-green']) }}"
                                    data-skin="skin-green"
                                    class="green-theme {{ Auth::user()->theme == 'skin-green' ? 'working' : '' }}">2</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-red']) }}" data-skin="skin-red"
                                    class="red-theme {{ Auth::user()->theme == 'skin-red' ? 'working' : '' }}">3</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-blue']) }}" data-skin="skin-blue"
                                    class="blue-theme {{ Auth::user()->theme == 'skin-blue' ? 'working' : '' }}">4</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-purple']) }}"
                                    data-skin="skin-purple"
                                    class="purple-theme {{ Auth::user()->theme == 'skin-purple' ? 'working' : '' }}">5</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-megna']) }}"
                                    data-skin="skin-megna"
                                    class="megna-theme {{ Auth::user()->theme == 'skin-megna' ? 'working' : '' }}">6</a>
                            </li>

                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-default-dark']) }}"
                                    data-skin="skin-default-dark"
                                    class="default-dark-theme {{ Auth::user()->theme == 'skin-default-dark' ? 'working' : '' }}">7</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-green-dark']) }}"
                                    data-skin="skin-green-dark"
                                    class="green-dark-theme {{ Auth::user()->theme == 'skin-green-dark' ? 'working' : '' }}">8</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-red-dark']) }}"
                                    data-skin="skin-red-dark"
                                    class="red-dark-theme {{ Auth::user()->theme == 'skin-red-dark' ? 'working' : '' }}">9</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-blue-dark']) }}"
                                    data-skin="skin-blue-dark"
                                    class="blue-dark-theme {{ Auth::user()->theme == 'skin-blue-dark' ? 'working' : '' }}">10</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-purple-dark']) }}"
                                    data-skin="skin-purple-dark"
                                    class="purple-dark-theme {{ Auth::user()->theme == 'skin-purple-dark' ? 'working' : '' }}">11</a>
                            </li>
                            <li><a href="{{ route('change-theme', ['theme' => 'skin-megna-dark']) }}"
                                    data-skin="skin-megna-dark"
                                    class="megna-dark-theme {{ Auth::user()->theme == 'skin-megna-dark' ? 'working' : '' }}">12</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2022 MEDYOUIN GROUP
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('primary/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('primary/assets/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('primary/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('primary/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('primary/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('primary/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('primary/dist/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('primary/assets/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('primary/assets/node_modules/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('primary/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Popup message jquery -->
    <script src="{{ asset('primary/assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('primary/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}">
    </script>
    <script src="{{ asset('primary/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}">
    </script>
    <script src="{{ asset('primary/assets/node_modules/nestable/jquery.nestable.js') }}"></script>

    <!-- Chart JS -->


    @if (Session::has('message'))
        <script>
            $.toast({
                heading: '{!! Session::get('title') !!}',
                text: '{!! Session::get('message') !!}',
                position: 'bottom-right',
                loaderBg: '#ff6849',
                icon: '{!! Session::get('type') !!}',
                hideAfter: 3500,
                stack: 6
            });
        </script>
    @endif

    <script src="{{ asset('primary/assets/node_modules/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('primary/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

   



    @livewireScripts




    @stack('scripts')
    @stack('scripts2')



</body>

</html>
