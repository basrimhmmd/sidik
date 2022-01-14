<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LMMC - @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('img/klinik.png') }}" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    @yield('css')
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>

    <!-- <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c42b033cec5adc3b394c', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
    });
    </script> -->
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('adm_dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/klinik.png') }}" style="width: 3em;">
                </div>
                <div class="sidebar-brand-text mx-3">SIDIK</div>
            </div>

            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Beranda</span></a>
            </li> -->

            <!-- Divider -->

            <div class="sidebar-heading">
                Menu
            </div>
            <hr class="sidebar-divider my-0">

            @yield('menu')

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-info topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i style="color: black" class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                        <div class="input-group">
                            <h4 style="color: white"><b>@yield('subhead')</b></h4>
                        </div>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-reply"></i>&nbsp; Ke Beranda</a>
                        </li>

                        <!-- Nav Item - Alerts -->
                        @if(Auth::user()->role_id == 3)
    
                        <li class="nav-item dropdown no-arrow mx-1" id="list-notif">
                            <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-count="0" class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">0</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                                
                            </div>
                        </li>
                        @endif
                        <script type="text/javascript">
                            var pusher = new Pusher('c42b033cec5adc3b394c', {
                                cluster: 'ap1'
                            });
                            var notificationWrap = $('#list-notif');
                            var notificationToggle = notificationWrap.find('a[data-toggle]');
                            var notificationCountElem = notificationToggle.find('i[data-count]');
                            var notificationCount = parseInt(notificationCountElem.data('count'));
                            var notification = notificationWrap.find('div.dropdown-list');

                            var channel = pusher.subscribe('medical-record-sent');
                            channel.bind('App\\Events\\MedicalRecordSent', function(data) {
                                var existingNotif = notification.html();
                                var newNotif = `
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">{{ \Carbon\Carbon::now() }}</div>
                                        <span class="font-weight-bold">`+data.message+`</span>
                                    </div>
                                </a>
                                `;
                                notification.html(existingNotif + newNotif);
                                notificationCount += 1;
                                notificationCountElem.attr('data-count', notificationCount);
                                notificationWrap.find('.badge-counter').text(notificationCount);
                            });
                        </script>
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-600 small"><b>
                                @if (Auth::user()->role_id == 1)
                                    {{ Auth::user()->admin->nama }}
                                @elseif (Auth::user()->role_id == 2)
                                    {{ Auth::user()->pasien->nama }}
                                @elseif (Auth::user()->role_id == 3)
                                    {{ Auth::user()->tenkesehatan->nama }}
                                @endif
                                </b></span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/klinik.png') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                                <!-- <a class="dropdown-item" href={{ route('home')}}>
                                    <i class="fas fa-reply fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ke Beranda
                                </a> -->
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                    @yield('content')

            </div>
            <!-- End of Main Content -->
    
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIDIK 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
        
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/dashboard/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/dashboard/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/dashboard/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/dashboard/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/dashboard/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/dashboard/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/dashboard/demo/chart-pie-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/dashboard/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/dashboard/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <!-- JavaScript for Notif -->

</body>

</html>