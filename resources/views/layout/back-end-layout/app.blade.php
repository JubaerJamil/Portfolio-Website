<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/faviconjjjjj_.png') }}">

<title>Jubaer Jamil Dashboard</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<!-- Nucleo Icons -->
<link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" />
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!-- CSS Files -->
<link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.0.6') }}" rel="stylesheet" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<!-- Axios file -->
<script src="{{asset('js/axios.min.js')}}"></script>
<!-- toastify js -->
<script src="{{asset('js/toastify-js.js')}}"></script>
<!-- config js -->
<script src="{{asset('js/config.js')}}"></script>
<!-- toastify css -->
<link rel="stylesheet" href="{{ asset('css/toastify.min.css') }}">
<!-- Loader css -->
<link rel="stylesheet" href="{{ asset('css/progress.css') }}">
<!--for table data-->
<link href="{{ asset('css/jquery-datatable.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-datatable.min.js') }}"></script>

</head>


  <body class="g-sidenav-show  bg-gray-100">


    {{-- Main sidebar start --}}
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

        {{-- Sidenav header start --}}
    <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="">
    <img src="{{ asset('img/faviconjj_.png') }}" class="navbar-brand-img h-100" alt="main_logo">
    <span class="ms-1 font-weight-bold text-white">Admin DashBoard</span>
    </a>
    </div>
        {{-- Sidenav header End --}}


    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

        {{-- user details start --}}
    <li class="nav-item mb-2 mt-0">
        <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button"
        aria-expanded="false">
          <img src="{{ asset('img/team-3.jpg') }}" class="avatar">
          <p class="nav-link-text ms-2 ps-1" id="myName">Admin Profile</p>
        </a>
        <div class="collapse" id="ProfileNav" style="">
          <ul class="nav ">
            <li class="nav-item">
              <a class="nav-link text-white link-primary" href="">
                <span class="sidenav-mini-icon"> MP </span>
                <span class="sidenav-normal  ms-3  ps-1"> My Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white link-primary" href="/logout">
                <span class="sidenav-mini-icon"> L </span>
                <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
        {{-- user details end --}}

      <hr class="horizontal light mt-0">

        {{-- Dashboard area start --}}
    <li class="nav-item">

        {{-- Dashboard title name area start --}}
    <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white " aria-controls="dashboardsExamples"
        role="button" aria-expanded="false">

    <i class="material-icons-round opacity-10">dashboard</i>

        <span class="nav-link-text ms-2 ps-1">Dashboard</span>
    </a>
        {{-- Dashboard title name area end --}}

        {{-- Dashboard Item area start --}}
<div class="collapse show" id="dashboardsExamples" style="">
    <div class="collapse show" >
    <ul class="nav ">
    <li class="nav-item ">
      <a class="nav-link text-white link-success" href="">
        <span class="sidenav-mini-icon"> A </span>
        <span class="sidenav-normal  ms-2  ps-1">List</span>
      </a>
    </li>
    </ul>
    </div>

    <div class="collapse show" >
        <ul class="nav">
        <li class="nav-item ">
          <a class="nav-link text-white link-success " href="">
            <span class="sidenav-mini-icon"> B </span>
            <span class="sidenav-normal  ms-2  ps-1"> List </span>
          </a>
        </li>
        </ul>
    </div>

    <div class="collapse show" >
        <ul class="nav ">
        <li class="nav-item ">
          <a class="nav-link text-white link-success " href="">
            <span class="sidenav-mini-icon"> C </span>
            <span class="sidenav-normal  ms-2  ps-1">List </span>
                </a>
            </li>
        </ul>
    </div>

    <div class="collapse show" >
        <ul class="nav ">
        <li class="nav-item ">
          <a class="nav-link text-white link-success" href="">
            <span class="sidenav-mini-icon"> D </span>
            <span class="sidenav-normal  ms-2  ps-1"> List </span>
                </a>
            </li>
        </ul>
    </div>

    <div class="collapse show" >
        <ul class="nav ">
        <li class="nav-item ">
          <a class="nav-link text-white link-success" href="">
            <span class="sidenav-mini-icon"> E </span>
            <span class="sidenav-normal  ms-2  ps-1"> List </span>
                </a>
            </li>
        </ul>
    </div>

    <div class="collapse show" >
        <ul class="nav ">
        <li class="nav-item ">
          <a class="nav-link text-white link-success" href="">
            <span class="sidenav-mini-icon"> F </span>
            <span class="sidenav-normal  ms-2  ps-1"> List </span>
                </a>
            </li>
        </ul>
    </div>

    <div class="collapse show" >
        <ul class="nav ">
        <li class="nav-item ">
          <a class="nav-link text-white link-success" href="">
            <span class="sidenav-mini-icon"> G </span>
            <span class="sidenav-normal  ms-2  ps-1"> List</span>
                </a>
            </li>
        </ul>
    </div>

</div>
        {{-- Dashboard Item area end --}}

    </li>
                {{-- Dashboard area end --}}
    </ul>
    </div>

    </aside>
    {{-- Main sidebar end --}}




    {{-- Start Navbar --}}
<main class="main-content border-radius-lg ">
    <!-- Navbar -->
    {{-- position-sticky if need plz uncomment --}}
<nav class="navbar navbar-main navbar-expand-lg mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky bg-info" id="navbarBlur" data-scroll="true">
<div class="container-fluid py-1 px-3">
<nav aria-label="breadcrumb">

  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="javascript:;">
        <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <title>shop </title>
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
              <g transform="translate(1716.000000, 291.000000)">
                <g transform="translate(0.000000, 148.000000)">
                  <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                  <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                </g>
              </g>
            </g>
          </g>
        </svg>
      </a>
    </li>
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">index</li>
  </ol>

  {{-- <h6class="font-weight-boldermb-0">index</h6> --}}

</nav>
<div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
  <a href="javascript:;" class="nav-link text-body p-0">
    <div class="sidenav-toggler-inner">
      <i class="sidenav-toggler-line"></i>
      <i class="sidenav-toggler-line"></i>
      <i class="sidenav-toggler-line"></i>
    </div>
  </a>
</div>
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
  <div class="ms-md-auto pe-md-3 d-flex align-items-center">
    {{-- <div class="input-group input-group-outline">
      <label class="form-label">Search here</label>
      <input type="text" class="form-control">
    </div> --}}
  </div>
  <ul class="navbar-nav  justify-content-end">
    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
      <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
        <div class="sidenav-toggler-inner">
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
        </div>
      </a>
    </li>
    <li class="nav-item px-3">
      <a href="javascript:;" class="nav-link text-body p-0">
        <i class="material-icons fixed-plugin-button-nav cursor-pointer">
          settings
        </i>
      </a>
    </li>
    <li class="nav-item dropdown pe-2">
      <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="material-icons cursor-pointer">
          notifications
        </i>

        <span class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2">
          <span class="small">11</span>
          <span class="visually-hidden">unread notifications</span>
        </span>
      </a>

      <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
        <li class="mb-2">
          <a class="dropdown-item border-radius-md" href="javascript:;">
            <div class="d-flex align-items-center py-1">
              <span class="material-icons">email</span>
              <div class="ms-2">
                <h6 class="text-sm font-weight-normal my-auto">
                  Check new messages
                </h6>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</div>
</div>
</nav>
{{-- End Navbar --}}

{{-- <div id="loader" class="d-flex justify-content-center align-items-center d-none" style="margin-top: 300px";>
    <button class="btn btn-primary" type="button" disabled>
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
    </button>
</div> --}}

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>


{{-- @include('components.loader') --}}
    {{-- id="content-div" --}}
<div>
    @yield('content')
</div>


<!--   Core JS Files   -->
<script src="{{ asset('js/core/popper.min.js') }}" ></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" ></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}" ></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}" ></script>
<script src="{{ asset('js/plugins/datatables.js') }}"></script>

<!-- Kanban scripts -->
<script src="{{ asset('js/plugins/dragula/dragula.min.js') }}"></script>
<script src="{{ asset('js/plugins/jkanban/jkanban.js') }}"></script>

<script>
    // const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
    //   searchable: false,
    //   fixedHeight: true
    // });

    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </script>

<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
var options = {
  damping: '1'
}
Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
</script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-dashboard.min.js?v=3.0.6') }}"></script>

</body>

</html>
