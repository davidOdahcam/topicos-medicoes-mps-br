<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>@stack('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>

        .form-control[readonly] {
            pointer-events: none;
        }
        .sidebar [data-bs-toggle=collapse]:after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: " ";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.2rem;
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }

        .sidebar [aria-expanded=true]:after,
        .sidebar [data-bs-toggle=collapse]:not(.collapsed):after {
            top: 1.4rem;
            transform: rotate(-135deg);
        }

        .sidebar [data-bs-toggle="collapse"]::after {
            border-color: initial;
        }

        .sidebar-dropdown .sidebar-item .sidebar-link {
            padding-left: 3rem;
            border: 0px;
        }

        .sidebar-dropdown .sidebar-item.active .sidebar-link {
            background: #222e3c;
            color: #fff;
            border: 0px;
        }
        .toast-error{
            background-color:#BD362F !important;
        }
        .toast-success{
            background-color:#51A351 !important;
        }
        .toast-info{
            background-color:#2F96B4 !important;
        }
        .toast-warning{
            background-color:#F89406 !important;
        }

        .filter-white {
            filter: brightness(0) invert(1);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="/">
                    <span class="align-middle">
                        <img class="filter-white" src="{{asset('img/logo.png')}}" alt="logo">
                    </span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Páginas
                    </li>

                    <li class="sidebar-item {{ request()->is('projetos*') ? 'active' : '' }}">
                        <a data-bs-target="#projects" data-bs-toggle="collapse" class="sidebar-link">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Projetos</span>
                        </a>
                        <ul id="projects"
                            class="sidebar-dropdown list-unstyled collapse {{ request()->is('projetos*') ? 'show' : '' }}"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('projetos') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('projects.index') }}">Listar</a>
                            </li>
                            <li class="sidebar-item {{ request()->is('projetos/cadastrar') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('projects.create') }}">Criar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ request()->is('propositos*') ? 'active' : '' }}">
                        <a data-bs-target="#purpose" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Própositos</span>
                        </a>
                        <ul id="purpose"
                            class="sidebar-dropdown list-unstyled collapse {{ request()->is('propositos*') ? 'show' : '' }}"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('propositos') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('purposes.index') }}">Listar</a>
                            </li>
                            <li class="sidebar-item {{ request()->is('propositos/cadastrar') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('purposes.create') }}">Criar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ request()->is('diretrizes*') ? 'active' : '' }}">
                        <a data-bs-target="#directives" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Diretriz</span>
                        </a>
                        <ul id="directives"
                            class="sidebar-dropdown list-unstyled collapse {{ request()->is('diretrizes*') ? 'show' : '' }}"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('diretrizes') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('directives.index') }}">Listar</a>
                            </li>
                            <li class="sidebar-item {{ request()->is('diretrizes/cadastrar') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('directives.create') }}">Criar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ request()->is('objetivos*') ? 'active' : '' }}">
                        <a data-bs-target="#objectives" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Objetivos</span>
                        </a>
                        <ul id="objectives"
                            class="sidebar-dropdown list-unstyled collapse {{ request()->is('objetivos*') ? 'show' : '' }}"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('objetivos') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('objectives.index') }}">Listar</a>
                            </li>
                            <li class="sidebar-item {{ request()->is('objetivos/cadastrar') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('objectives.create') }}">Criar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ request()->is('metricas*') ? 'active' : '' }}">
                        <a data-bs-target="#metrics" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Métricas</span>
                        </a>
                        <ul id="metrics"
                            class="sidebar-dropdown list-unstyled collapse {{ request()->is('metricas*') ? 'show' : '' }}"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('metricas') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('metrics.index') }}">Listar</a>
                            </li>
                            <li class="sidebar-item {{ request()->is('metricas/cadastrar') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('metrics.create') }}">Criar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle ms-3">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#"
                                onclick="document.getElementById('logout-form').submit()" id="messagesDropdown"
                                data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="log-out"></i>
                                </div>
                            </a>
                            <form action="{{ route('auth.logout') }}" method="POST" id="logout-form">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')



            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0 text-muted">
                                <strong>Todos os direitos reservados</strong> &copy;
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @stack('modal')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/translateTable.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}")
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}")
        @endif
        @if (session('warning'))
            toastr.warning("{{ session('warning') }}")
        @endif
    </script>

    @stack('js')
</body>

</html>
