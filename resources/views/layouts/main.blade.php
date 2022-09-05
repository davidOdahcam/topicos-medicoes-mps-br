<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>@stack('title')</title>
    <link href="./css/app.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
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
    </style>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Projeto</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Páginas
                    </li>

                    <li class="sidebar-item active">
                        <a data-bs-target="#users" data-bs-toggle="collapse" class="sidebar-link">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Usuários</span>
                        </a>
                        <ul id="users" class="sidebar-dropdown list-unstyled collapse show"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item active">
                                <a class="sidebar-link" href="index.html">Listar</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Criar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#projects" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Projetos</span>
                        </a>
                        <ul id="projects" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Listar</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Criar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#purpose" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Própositos</span>
                        </a>
                        <ul id="purpose" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Listar</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Criar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#directives" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Diretriz</span>
                        </a>
                        <ul id="directives" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Listar</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Criar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#objectives" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Objetivos</span>
                        </a>
                        <ul id="objectives" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Listar</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Criar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#metrics" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Métricas</span>
                        </a>
                        <ul id="metrics" class="sidebar-dropdown list-unstyled collapse"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Listar</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="index.html">Criar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown"
                                data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="log-out"></i>
                                </div>
                            </a>
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

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="./js/app.js"></script>
    <script type="text/javascript" src="./js/translateTable.js"></script>
    <script>
        $(function() {
            $('#myTable').DataTable({
                "language": json
            });
        });
    </script>
</body>

</html>
