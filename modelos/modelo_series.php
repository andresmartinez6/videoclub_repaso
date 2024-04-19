<?php

class series{
    private $bd;
    private $series;

    public function __construct(){
        $this->bd=conectar::conexion();
    }

    //INSERTAR SERIE
    public function insertar_serie($nombre,$descripcion,$foto,$activo){
        $sentencia_insertar_serie="INSERT INTO series(nombre,descripcion,foto,activo) VALUES( ?, ?, ?, ?)";

        $consulta=$this->bd->prepare($sentencia_insertar_serie);
        $consulta->bind_param("sssi",$nombre,$descripcion,$foto,$activo);
        $consulta->execute();
        $consulta->close();
    }

    //MODIFICAR SERIE
    public function modificar_series($nombre, $descripcion,$foto,$activo){
        $sentencia_modificar_serie = "UPDATE series SET nombre = ?, descripcion = ?, foto = ?, activo = ? 
                                     WHERE id = ?";

        $consulta = $this->bd->prepare($sentencia_modificar_serie);
        $consulta->bind_param("sssi", $nombre,$descripcion,$foto,$activo);
        $consulta->execute();
        $consulta->close();
    }

    //DESACTIVAR SERIE
    public function desactivar_series($id) {
        $sentencia_desactivar_series = "UPDATE series SET activo = '0' 
                                       WHERE id = ?";

        $consulta = $this->bd->prepare($sentencia_desactivar_series);
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $consulta->close();
    }

    //BUSCAR SERIE POR NOMBRE
    public function buscar_serie_nombre($nombre) {
        $sentencia_buscar_serie_nombre = "SELECT * 
                                           FROM series 
                                           WHERE nombre LIKE ?";

        $consulta = $this->bd->prepare($sentencia_buscar_serie_nombre);
        $nombreBusqueda = "%{$nombre}%"; 
        $consulta->bind_param("s", $nombreBusqueda);
        $consulta->execute();
        
        $resultado = $consulta->get_result();
        $seriesEncontradas = $resultado->fetch_all(MYSQLI_ASSOC);
    
        $consulta->close();
    
        return $seriesEncontradas;
    }

    //BUSCAR SERIE POR ID
    public function buscar_serie_id($id){
        $sentencia_buscar_serie_id= "SELECT * 
                                    FROM series 
                                    WHERE id LIKE ?";

        $consulta=$this->bd->prepare($sentencia_buscar_serie_id);
        $nombreBusqueda="%{$id}%";
    }

    //LISTAR SERIES
    public function listar_series(){
        $sentencia_listar_series="SELECT *
                                  FROM series
                                  WHERE activo='1' ";

        $consulta=$this->bd->prepare($sentencia_listar_series);
        $consulta->execute();
        $resultado=$consulta->get_result();
        $series=[];

        while($fila=$resultado->fetch_assoc()){
            $series[]=$fila;
        }

        $consulta->close();
        return $series;

    }

}

?>