<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
    <title>ver series completas</title>
</head>
<body>
<?php

    require('./php/funciones.php');
    $id = comprobar_usuario();
    pinta_menu($id);

    include "./bd/bd.php";
    include "./modelos/modelo_plataformas.php";
    include "./modelos/modelo_lanzamientos.php";

    $plataformas=new plataformas();
    $listaPlataformas=$plataformas->listar_plataformas();
    $lanzamientos=new lanzamientos();
    $listaLanzamientos=[];

    foreach ($listaPlataformas as $plataforma) {
        array_push($listaLanzamientos, $lanzamientos->buscar_lanzamiento_plataforma($plataforma['id']));
    }

    //LISTAR LANZAMIENTOS
    include "./vistas/vista_mostrarSeries.php";
    ?>

    <section class="container-fluid py-5 text-center" 
    style="
        background-image: url(../assets/img/series/5.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        min-height: 70vh;
    ">

        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>

    <footer>
        <?php 
        pinta_footer(); 
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>