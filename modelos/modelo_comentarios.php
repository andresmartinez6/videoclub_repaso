<?php

class Comentarios{
    private $bd;
    private $comentarios;


    public function __construct(){
        $this->bd=conectar::conexion();
    }


    //INSERTAR COMENTARIO
    public function añadir_comentario($socio_id, $serie_id, $fecha, $texto) {
        $sentencia_añadir_comentario = "INSERT INTO comentario * VALUES (?, ?, ?, ?)";

        $consulta = $this->bd->prepare($sentencia_añadir_comentario);
        $consulta->bind_param("iiss", $socio_id, $serie_id, $fecha, $texto);
        $consulta->execute();
        $consulta->close();
    }

    //BORRAR COMENTARIO
    public function borrar_comentario($socio, $serie) {
        $sentencia_borrarComentario = "DELETE FROM comentario 
                                       WHERE socio = ? AND serie = ?";

        $consulta = $this->bd->prepare($sentencia_borrarComentario);
        $consulta->bind_param("ii", $socio, $serie);
        $consulta->execute();
        $consulta->close();
    }

    //BUSCAR COMENTARIO POR SERIE
    public function obtener_comentarios_serie($serie_id) {
        $sentencia_obtener_comentarios = "SELECT * 
                                         FROM comentario 
                                         WHERE serie = ?";

        $consulta = $this->bd->prepare($sentencia_obtener_comentarios);
        $consulta->bind_param("i", $serie_id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $comentarios = $resultado->fetch_all(MYSQLI_ASSOC);
        $consulta->close();

        return $comentarios;
    }

    //LISTAR ÚLTIMOS 5 COMENTARIOS
    public function ultimos_comentarios() {
        $sentencia_ultimos_comentarios="SELECT socios.nombre AS nombreSocio, series.nombre AS nombreSerie,series.foto, comentario.fecha, comentario.texto 
                                        FROM comentario, series, socios
                                        WHERE comentario.serie = series.id
                                        AND comentario.socio = socios.id
                                        ORDER BY comentario.fecha DESC
                                        LIMIT 5";

        $consulta = $this->bd->prepare($sentencia_ultimos_comentarios);
        $consulta->execute();
        $resultado= $consulta->get_result();
        $comentarios=$resultado->fetch_all(MYSQLI_ASSOC);

        $consulta->close();
        return $resultados;
    }

    //LISTAR COMENTARIOS
    public function listar_comentarios($serie_id) {
        $sentencia_listar_comentarios = "SELECT * 
                                         FROM comentario 
                                         WHERE serie = ?";

        $consulta = $this->bd->prepare($sentencia_listar_comentarios);
        $consulta->bind_param("i", $serie_id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $comentarios = $resultado->fetch_all(MYSQLI_ASSOC);
        $consulta->close();

        return $comentarios;
    }
    
    //COMPROBAR COMENTARIOS
    public function comprobar_comentario($id_socio, $id_serie) {
        $comprobar = false;
        $sentencia_comprobar_comentarios="SELECT count(*)
                                          FROM comentario 
                                          WHERE socio = ? AND serie = ?";

        $consulta = $this->BD->prepare($sentencia_comprobar_comentarios);
        $consulta->bind_param('ii', $id_socio, $id_serie);
        $consulta->bind_result($cantComentarios);
        $consulta->execute();
        $consulta->fetch();

        if ($cantComentarios>0) {
            $comprobar=true;
        }

        $consulta->close();
        return $comprobar;
    }
    
    


}

?>