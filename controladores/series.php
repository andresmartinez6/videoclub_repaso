<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
    <title>Series</title>
</head>
<body>
    <?php
        require('./php/funciones.php');
        $id=comprobar_usuario();
        pintar_menu($id);

        include "./bd/bd.php";
        include "./modelos/modelo_plataformas.php";
        include "./modelos/modelo_lanzamientos.php";

        $plataformas=new plataformas();
        $listaPlataformas=$plataformas->listar_plataformas();
        $lanzamientos=new lanzamientos();
        $listaLanzamientos=[];

        foreach($listaPlataformas as $plataforma) {
            array_push($listaLanzamientos, $lanzamientos->buscar_lanzamiento_plataforma($plataforma['id']));
        }

        //LISTAR LANZAMIENTOS
        include "./vistas/vista_mostrarSeries.php";

        ?>

        <footer>
            <?php 
                pintarFooter();
            ?>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>