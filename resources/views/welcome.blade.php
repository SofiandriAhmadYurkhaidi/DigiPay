<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    DigiPay
  </title>
  <!--     Fonts and icons     -->
  <link href="{{ url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}"
  rel="stylesheet" />
  <link href="{{url('/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{url('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{url('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="{{url('https://kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous"></script>
  <link href="{{url('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{url('/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />

  <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css')}}">
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{url('/assets/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">DigiPay</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    {{-- <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main"> --}}


        <ul class="navbar-nav">
            <!-- Dashboard -->
            @if (
              request()->is('dashboard') ||
              request()->is('dashboard/*') ||
              request()->is('*/dashboard') ||
              request()->is('*/dashboard/*')
            )
              <li class="nav-item active">
            @endif
            <li class="nav-item">
              <a href="/dashboard" class="nav-link">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                <div data-i18n="Analytics" class="nav-link-text ms-1">Dashboard</div>
              </a>
            </li>


            @if (Auth::user()->level == 'admin')
              @if (
                request()->is('kelas') ||
                request()->is('kelas/*') ||
                request()->is('*/kelas') ||
                request()->is('*/kelas/*')
              )
              <li class="nav-item active">
              @endif
              <li class="nav-item">
                <a href="/kelas" class="nav-link">
                  <i class="ni ni-building text-warning text-sm opacity-10"></i>
                  <div data-i18n="Tables" class="nav-link-text ms-1">Kelas</div>
                </a>
              </li>

              <!-- Tables -->
              @if (
                request()->is('spp') ||
                request()->is('spp/*') ||
                request()->is('*/spp') ||
                request()->is('*/spp/*')
              )
                <li class="nav-item active">
              @endif
              <li class="nav-item">
                <a href="/spp" class="nav-link">
                  <i class="ni ni-credit-card text-warning text-sm opacity-10"></i>
                  <div data-i18n="Tables" class="nav-link-text ms-1">Spp </div>
                </a>
              </li>

              @if (
                request()->is('siswa') ||
                request()->is('siswa/*') ||
                request()->is('*/siswa') ||
                request()->is('*/siswa/*')
              )
                <li class="nav-item active">
              @endif
                <li class="nav-item">
                  <a href="/siswa" class="nav-link">
                    <i class="ni ni-circle-08 text-success text-sm opacity-10"></i>
                    <div data-i18n="Tables" class="nav-link-text ms-1">Siswa</div>
                  </a>
                </li>

              @if (
                request()->is('petugas') ||
                request()->is('petugas/*') ||
                request()->is('*/petugas') ||
                request()->is('*/petugas/*')
              )
                <li class="nav-item active">
              @endif
                <li class="nav-item">
                  <a href="/petugas" class="nav-link">
                    <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                    <div data-i18n="Tables" class="nav-link-text ms-1">Petugas</div>
                  </a>
                </li>

              @if (
                request()->is('pembayaran') ||
                request()->is('pembayaran/*') ||
                request()->is('*/pembayaran') ||
                request()->is('*/pembayaran/*')
              )
                <li class="nav-item active">
              @endif
                <li class="nav-item">
                  <a href="/pembayaran" class="nav-link">
                    <i class="ni ni-money-coins text-danger text-sm opacity-10"></i>
                    <div data-i18n="Tables" class="nav-link-text ms-1">Pembayaran</div>
                  </a>
                </li>

            @elseif (Auth::user()-> level == 'petugas')
              @if (
                request()->is('petugas/pembayaran/*') ||
                request()->is('*/petugas/pembayaran') ||
                request()->is('*/petugas/pembayaran*')
              )
                <li class="nav-item active">
              @endif
                <li class="nav-item">
                  <a href="{{ route('pembayaran.petugas.view') }}" class="nav-link">
                    <i class="ni ni-money-coins text-danger text-sm opacity-10"></i>
                    <div data-i18n="Tables" class="nav-link-text ms-1">Pembayaran</div>
                  </a>
                </li>
            @else()
            @if (
                request()->is('siswa/history/pembayaran*') ||
                request()->is('*/siswa/history/pembayaran') ||
                request()->is('*/siswa/history/pembayaran*')
              )
                <li class="nav-item active">
              @endif
                <li class="nav-item">
                  <a href="siswa/history/pembayaran" class="nav-link">
                    <i class="ni ni-collection text-danger text-sm opacity-10"></i>
                    <div data-i18n="Tables">History Pembayaran</div>
                  </a>
                </li>
            @endif

          </ul>



    {{-- </div> --}}
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow mt-4 py-2 start-0 end-0 mx-4">
        <div class="container-fluid py-1 px-3">
          <h1 class="navbar-brand font-weight-bolder ms-lg-0 ms-3 ">
            Hello {{ Auth::user()->name }}
          </h1>
          <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
            </ul>
            <ul class="navbar-nav  justify-content-end">

                <li class="nav-item">
                    <a class="nav-link font-weight-bold px-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa fa-user me-sm-1"></i>
                      <div data-i18n="Tables" class="d-sm-inline d-none">Logout</div>
                    </a>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </li>

              </ul>
          </div>
        </div>
      </nav>
      <br>

    <!-- End Navbar -->
    @yield('content')
  </main>
  <!--   Core JS Files   -->
  <script src="{{url('/assets/js/core/popper.min.js')}}"></script>
  <script src="{{url('/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="{{url('https://buttons.github.io/buttons.js')}}"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{url('/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
  <script src="{{url('https://code.jquery.com/jquery-3.5.1.js')}}"></script>
  <script src="{{url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js')}}"></script>

  <script>
    $(document).ready(function () {
        $('#tableSiswa').DataTable();
    });
</script>

<script>
    $(document).ready(function () {
        $('#tablePetugas').DataTable();
    });
</script>

<script>
    $(document).ready(function () {
        $('#tablePembayaran').DataTable();
    });
</script>
</body>

</html>
