<?php

class Lanzamientos{
    private $bd;
    private $lanzamientos;

    //CONSTRUCTOR
    public function __construct(){
        $this->bd=conectar::conexion();
    }

    //INSERTAR LANZAMIENTOS
    public function insertar_lanzamiento($serie, $plataforma, $fecha) {
        $sentencia_insertar_lanzamiento ="INSERT INTO lanzamientos (serie, plataforma, fecha) VALUES (?, ?, ?)";

        $consulta = $this->bd->prepare($sentencia_insertar_lanzamiento);
        $consulta->bind_param("iis", $serie, $plataforma, $fecha);
        $consulta->execute();
        $consulta->close();
    }

    //MODIFICAR LANZAMIENTOS
    public function modificar_lanzamiento($serie, $plataforma, $fecha) {
        $sentencia_modificar_lanzamiento = "UPDATE lanzamientos 
                                           SET fecha = ? 
                                           WHERE serie = ? AND plataforma = ?";

        $consulta = $this->bd->prepare($sentencia_modificar_lanzamiento);
        $consulta->bind_param("iis",$fecha,$serie,$plataforma);
        $consulta->execute();
        $consulta->close();
    }

    //BORRAR LANZAMIENTO
    public function borrar_lanzamiento($serie, $plataforma) {
        $sentencia_borrar_lanzamiento = "DELETE FROM lanzamientos 
                                         WHERE serie = ? AND plataforma = ?";

        $consulta = $this->bd->prepare($sentencia_borrar_lanzamiento);
        $consulta->bind_param("ii", $serie, $plataforma);
        $consulta->execute();
        $consulta->close();
    }

    //BUSCAR LANZAMIENTO POR SERIE
    public function obtener_lanzamiento_serie($serie){
        $sentencia_obtener_lanzamiento_serie="SELECT plataformas.nombre,lanzamientos.fecha
                                        FROM lanzamientos,plataformas
                                        WHERE lanzamientos.plataforma AND 
                                        lanzamientos.serie = ?";

        $consulta=$this->bd->prepare($sentencia_obtener_lanzamiento_serie);
        $consulta->bind_param("i",$serie);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $lanzamientos = $resultado->fetch_all(MYSQLI_ASSOC);
        $consulta->close();

        return $lanzamientos;
    }

    //BUSCAR LANZAMIENTO POR PLATAFORMA
    public function buscar_lanzamiento_plataforma($plataforma){
        $sentencia_buscar_lanzamiento_plataforma="SELECT series.id,series.nombre,series.foto,lanzamientos.fecha
                                                   FROM lanzamientos,series
                                                   WHERE lanzamientos.serie=series.id
                                                   AND lanzamientos.plataforma = ?";

        $consulta=$this->bd->prepare($sentencia_buscar_lanzamiento_plataforma);
        $consulta->bind_param("i",$plataforma);
        $consulta->execute();
        $resultado=$consulta->get_result();
        $lanzamientos=$resultado->fetch_all(MYSQLI_ASSOC);
        $consulta->close();

        return $lanzamientos;
    }

    //ÚLTIMOS 4 LANZAMIENTOS
    public function ultimos_lanzamientos($plataforma){
        $sentencia_ultimos_lanzamientos="SELECT series.nombre,lanzamientos.fecha
                                         FROM lanzamientos,series
                                         WHERE lanzamientos.serie=series.id
                                         AND lanzamientos.plataforma = ?
                                         LIMIT 4";

        $consulta=$this->bd->prepare($sentencia_ultimos_lanzamientos);
        $consulta->bind_param("i",$plataforma);
        $consulta->execute();
        $resultado=$consulta->get_result();
        $lanzamientos=$resultado->fetch_all(MYSQLI_ASSOC);
        $consulta->close();

        return $lanzamientos;
    }


    //LISTADO SERIES DE PLATAFORMA
    public function listar_series_plataforma($plataforma){
        $sentencia_listar_series_plataforma="SELECT series.id,series.nombre,series.foto
                                             FROM lanzamientos, series
                                             WHERE lanzamientos.serie = series.id
                                             AND lanzamientos.plataforma = ?";

        $consulta=$this->bd->prepare($sentencia_listar_series_plataforma);
        $consulta->bind_param("i",$plataforma);
        $consulta->execute();
        $resultado=$consulta->get_result();
        $lanzamientos=$resultado->fetch_all(MYSQLI_ASSOC);
        $consulta->close();

        return $lanzamientos;
    }


    //LISTAR LANZAMIENTOS
    public function listar_lanzamientos(){
        $sentencia_listar_lanzamientos="SELECT *
                                        FROM lanzamientos
                                        ORDER BY fecha DESC ";
        $consulta=$this->bd->prepare($sentencia_listar_lanzamientos);
        $consulta->execute();
        $resultado=$consulta->get_result();
        $lanzamientos=$resultado->fetch_all(MYSQLI_ASSOC);
        $consulta->close();

        return $lanzamientos;

    }


}

?>