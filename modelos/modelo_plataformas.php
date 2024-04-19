<?php

class Plataformas{

    private $bd;
    private $plataformas;

    //CONSTRUCTOR
    public function __construct(){
        $this->bd=conectar::conexion();
    }

    //INSERTAR PLATAFORMA
    public function insertar_plataforma($nombre,$activo,$logotipo){
        $sentencia_insertar_plataforma="INSERT INTO plataforma(nombre,activo,logotipo) VALUES( ?, ?, ?);";

        $consulta=$this->bd->prepare($sentencia_insertar_plataforma);
        $consulta->bind_param("sis",$nombre,$activo,$logotipo);
        $consulta->execute();
        $consulta->close();
    }

    //MODIFICAR PLATAFORMA
    public function modificar_plataformas($id, $nombre, $activo, $logotipo) {
        $sentencia_modificar_plataformas = "UPDATE plataformas SET nombre = ?, activo = ?, logotipo = ? 
                                           WHERE id = ?";

        $consulta = $this->bd->prepare($sentencia_modificar_plataformas);
        $consulta->bind_param("sssi", $nombre, $activo, $logotipo, $id);
        $consulta->execute();
        $consulta->close();
    }
    

    //BUSCAR SERIE
    public function buscarSeriePorPlataforma($nombre_plataforma) {
        $sentencia_buscar_serie_plataforma = "SELECT * 
                                              FROM plataformas 
                                              WHERE nombre LIKE ? 
                                              AND activo = '1' ";
    
        $consulta = $this->BD->prepare($sentencia_buscar_serie_plataforma);
        $consulta->bind_param("s", $nombre_plataforma);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $plataformas=[];
    
        while ($fila=$resultado->fetch_assoc()) {
            $plataformas[] = $fila;
        }
    
        $consulta->close();
        return $plataformas;
    }

    //LISTAR PLATAFORMAS
    public function listar_plataformas(){
        $sentencia_listar_plataformas="SELECT *
                                       FROM plataformas
                                       WHERE activo='1' ";

        $consulta=$this->bd->prepare($sentencia_listar_plataformas);
        $consulta->execute();
        $resultado=$consulta->get_result();
        $plataformas=[];
        
        while ($fila=$resultado->fetch_assoc()) {
            $plataformas[]=$fila;
        }
        
        $consulta->close();
        return $plataformas;
        
    }


}

?>