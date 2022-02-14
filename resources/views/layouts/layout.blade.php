<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <!-- Our CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/js/solid.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/js/fontawesome.min.js"></script>


</head>

<body class="bg-dark">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col p-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-gray d-flex justify-content-end py-1">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white pe-3 border-end" href="#"><b>SanttoPecado</b></a>
                        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-white"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item px-1">
                                    <a class="btn btn-outline-light border-0 {{ Request::is('/') ? 'active' : '' }}"
                                        href="{{ url('/') }}"><i class="fas fa-chart-line"></i> Reports</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="btn btn-outline-light border-0 {{ Request::is('products') ? 'active' : '' }}"
                                        href="{{ url('products') }}"><i class="fas fa-utensils"></i> Products</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="btn btn-outline-light border-0 {{ Request::is('events') ? 'active' : '' }}"
                                        href="{{ url('events') }}"><i class="fas fa-calendar-alt"></i> Events</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="btn btn-outline-light border-0 {{ Request::is('history') ? 'active' : '' }}"
                                        href="{{ url('history') }}"><i class="fas fa-history"></i> Sales history</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
