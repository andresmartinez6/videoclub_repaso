<?php
require_once './bd/bd.php';
require_once './modelos/modelo_videoclub.php';



function mostrar_menu_admin() {
    echo '<nav>';
    echo '<ul>';
    echo '<li><a href="listado_series.php">Series</a></li>';
    echo '<li><a href="listado_plataformas.php">Plataformas</a></li>';
    echo '<li><a href="listado_socios.php">Socios</a></li>';
    echo '<li><a href="listado_comentarios.php">Comentarios</a></li>';
    echo '<li><a href="salir.php">Salir</a></li>';
    echo '</ul>';
    echo '</nav>';
}



//SOCIOS:

function ver_comentarios($serie_id) {
    //mostrar comentarios de una serie
    $comentarios = $this->modelo->obtener_comentarios_serie($serie_id);
    $this->vista->mostrar_comentarios($comentarios);
}

function añadir_comentario($socio_id, $serie_id, $fecha, $texto) {
    //añadir comentario
    $this->modelo->añadir_comentario($socio_id, $serie_id, $fecha, $texto);
}

function borrar_comentario($socio_id, $serie_id) {
    //borrar comentario propio
    $this->modelo->borrar_comentario($socio_id, $serie_id);
}


//CONTROL DE ACCESO:

function verificar_permisos($usuario_id, $permiso) {
    $roles = $this->modelo->obtener_roles_usuario($usuario_id);

    // Verificar si alguno de los roles tiene el permiso necesario
    foreach ($roles as $rol) {
        $tienePermiso = $this->modelo->verificar_permiso_rol($rol['id'], $permiso);
        if ($tienePermiso) {
            return true;
        }
    }

    return false;
}



?>