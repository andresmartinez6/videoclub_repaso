<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="../imgs/palomitas.jpg" type="image/x-icon">
    <title>Inicio</title>
</head>

<body>

    <?php
    require('./php/funciones.php');
    $id = comprobar_usuario();
    pinta_menu_index($id);

    include "./bd/bd.php";
    include "./modelos/modelo_plataformas.php";
    include "./modelos/modelo_lanzamientos.php";

    $plataforma = new Plataformas();
    $listaPlataformas = $plataforma->listar_plataformas();


    require("./modelos/modelo_lanzamientos.php");
    $lanzamientos = new Lanzamientos();


    foreach($listaPlataformas as $plataforma) {
        $idPlataforma=$plataforma['id'];
        $ultimosLanzamientos=$lanzamientos->ultimos_lanzamientos($idPlataforma);

        // ÚLTImOS LANZAMIENTOS  
        foreach ($ultimosLanzamientos as $lanzamiento) {
            echo mostrar_lanzamiento($lanzamiento);
        }
    }

    include "./modelos/modelo_comentarios.php";
    $comentario = new Comentarios();
    // ÚLTIMOS COMENTARIOS 
    carrousel_comentarios($comentario->ultimos_comentarios());
    ?>

    <footer>
        <?php
        pinta_footer();
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
