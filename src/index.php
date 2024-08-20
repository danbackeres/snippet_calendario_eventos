<?php
    require_once __DIR__.'/Controller/EventoController.php';
    require_once __DIR__.'/Model/EventoModel.php';
    
    use App\Controller\EventoController;
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="/public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-fluid mt-2">
        <div class="row">
            <div class="col-9 bg-light d-flex justify-content-center align-items-center text-center"
                style="height: 93vh;">
                <h1>Calendário de Eventos</h1>
            </div>
            <div class="col-3" style="padding: 20px;">
                <aside
                    style="background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                    <h4 style="text-align: center; font-weight: bold;">Calendário</h4>

                    <?php 
                    # CALENDÁRIO EVENTOS AQUI
                    $controller = new EventoController();
                    $controller->index();
                ?>

                </aside>
            </div>
        </div>
    </main>


    <script src="/public/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/public/js/jquery/dist/jquery.min.js"></script>
    <script src="/public/site.js"></script>
</body>

</html>