<?php
class socios{
    private $bd;
    private $socios;

    public function __construct(){
        $this->bd=conectar::conexion();
    }


    //INSERTAR SOCIOS
    public function insertar_socio($id,$nombre, $nick, $pass, $activo) {
        
        $sentencia_insertar_socio= "INSERT INTO socios (nombre, nick, pass, activo) VALUES (?, ?, ?, ?)";

        $consulta = $this->bd->prepare($sentencia_insertar_socio);
        $consulta->bind_param("ssss", $nombre, $nick, $pass, $activo);
        $consulta->execute();
        $consulta->close();
    }
    
    //MODIFICAR SOCIO
    public function modificar_socio($id, $nombre, $nick, $pass, $activo) {
        $sentencia_modificar_socio= "UPDATE socios SET nombre = ?, nick = ?, pass = ?, activo = ? 
                                      WHERE id = ?";

        $consulta = $this->bd->prepare($sentencia_modificar_socio);
        $consulta->bind_param("ssssi", $nombre, $nick, $pass, $activo, $id);
        $consulta->execute();
        $consulta->close();
    }

    //DESACTIVAR SOCIO
    public function desactivar_socio($id) {
        $sentencia_desactivar_socio="UPDATE socios SET activo = '0' 
                                     WHERE id = ?";

        $consulta = $this->bd->prepare($sentencia_desactivar_socio);
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $consulta->close();
    }

    //BUSCAR SOCIO
        public function buscar_socio($nombre) {
            $sentencia_buscar_socio="SELECT * 
                                     FROM socios 
                                     WHERE nombre LIKE ?";

            $consulta = $this->bd->prepare($sentencia_buscar_socio);
            $nombreBusqueda = "%{$nombre}%"; 
            $consulta->bind_param("s", $nombreBusqueda);
            $consulta->execute();
        
            $resultado=$consulta->get_result();
            $socio=$resultado->fetch_all(MYSQLI_ASSOC);
        
            $consulta->close();
        
            return $socio;
        }

    //LOGIN SOCIO
        public function login_socio($nombre,$pass){
            $sentencia_login_socio="SELECT id
                                    FROM socios
                                    WHERE nick = ?
                                    AND pass = ?";

            $consulta=$this->bd->prepare($sentencia_login_socio);
            $consulta->bind_param("ss",$nombre,$pass);
            $consulta->execute();
            $resultado=$consulta->get_result();

            if ($resultado->num_rows > 0) {
                $id = $resultado->fetch_assoc()['id'];
            } else {
                $id = -1;
            }

            $consulta->close();
            return $id;
        }

    //LISTAR SOCIOS
        public function listar_socios(){
            $sentencia_listar_socios="SELECT * 
                                      FROM socios
                                      WHERE activo='1' ";

            $consulta=$this->bd->query($sentencia_listar_socios);
            $socios=$consulta->fetch_all(MYSQLI_ASSOC);
            $consulta->close();            
            return $socios;
            
        }
    


}

?>