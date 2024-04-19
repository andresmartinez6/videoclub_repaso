<?php


//Función comprueba_usuario
function comprobar_usuario() {
    session_start();

    if (isset($_SESSION['id_usuario'])) {
        return $_SESSION['id_usuario'];
    }

    if (isset($_COOKIE['id_usuario'])) {
        return $_COOKIE['id_usuario'];
    }

    return -1;
}


//Función pinta_menu_index
function pinta_menu_index($id) {
   
    if($id==0){
        echo '
            <<nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="../imgs/logo.png" alt=""class="img-fluid"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><img src="../imgs/logo.png" alt="" class="img-fluid"></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Nuestras plataformas</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Cartelera
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="#">Peliculas</a></li>
                                        <li><a class="dropdown-item" href="#">Series</a></li>
                                        <li><a class="dropdown-item" href="#">Acceder</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex mt-3" role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-primary" role="button" aria-disabled="true">Aceptar</button>
                            </form>
                        </div>
                    </div>
                </div>
        </nav>
    ';

    }elseif($id>0){
        echo '
            <nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="../imgs/logo.png" alt=""class="img-fluid"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><img src="../imgs/logo.png" alt="" class="img-fluid"></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Nuestras plataformas</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                         Cartelera
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="#">Peliculas</a></li>
                                        <li><a class="dropdown-item" href="#">Series</a></li>
                                        <li><a class="dropdown-item" href="#">Acceder</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex mt-3" role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-primary" role="button" aria-disabled="true">Aceptar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
    ';
    }else{
        echo '<nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="../imgs/logo.png" alt=""class="img-fluid"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><img src="../imgs/logo.png" alt="" class="img-fluid"></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Nuestras plataformas</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Cartelera
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="#">Peliculas</a></li>
                                        <li><a class="dropdown-item" href="#">Series</a></li>
                                        <li><a class="dropdown-item" href="#">Acceder</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex mt-3" role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-primary" role="button" aria-disabled="true">Aceptar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
    ';

    }
}


//Función pinta_menu
function pinta_menu($id) {

    if($id==0){
        echo '
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" aria-current="page" href="#">VideoClub</a>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./controladores/series.php">Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./controladores/plataformas.php">Plataformas</a>
                        </li>
                    </ul>
                    <span class="navbar-text me-4">
                        <a class="nav-link" href="">Cerrar sesión '.$_SESSION['nick'].'</a>
                    </span>
                </div>
            </div>
        </nav>
    ';

    }elseif($id>0){
        echo '
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" aria-current="page" href="#">VideoClub</a>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Inmuebles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Contacto</a>
                        </li>
                    </ul>
                    <span class="navbar-text me-4">
                        <a class="nav-link" href="p">Cerrar sesión '.$_SESSION['nick'].'</a>
                    </span>
                </div>
            </div>
        </nav>
    ';
    }else{
        echo '
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" aria-current="page" href="#">VideoClub</a>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./controladores/series.php">Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./controladores/plataformas.php">Plataformas</a>
                        </li>
                    </ul>
                    <span class="navbar-text me-4">
                        <a class="nav-link" href="">Acceder</a>
                    </span>
                </div>
            </div>
        </nav>
    ';
    }
}


// Función pinta_footer
function pinta_footer() {

    $footer='
        <footer class="bg-body-tertiary text-center text-lg-start">
            <div class="text-center p-3">
                ©' . date("Y") . 'VideoClub.COPYRIGHT.
            </div>
        </footer>
    ';

    echo $footer;

}

// Función carrousel_comentarios
function carrousel_comentarios($comentarios){

    echo'
        <div id="carouselComentarios" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">';
            
    foreach($comentarios as $index => $comentario) {
        $activeClass = ($index == 0) ? 'active' : '';
        echo'
                <div class="carousel-item ' . $activeClass . '">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">'.$comentario['nombre'] . '</h5>
                            <p class="card-text">'.$comentario['contenido'] . '</p>
                        </div>
                    </div>
                </div>';
    }
    
    echo'
        <div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselComentarios" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            
            <button class="carousel-control-next" type="button" data-bs-target="#carouselComentarios" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>';
}


?>