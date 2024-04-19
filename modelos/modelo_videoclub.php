<?php

    class modelo_videoclub{
        private $bd;
        private $videoclub;

        public function __construct(){
            $this->bd=conectar::conexion();
        }

        //SERIES:

        public function Insertar_series($nombre, $descripcion,$foto,$activo){
            $sentencia_insertarSeries = "INSERT INTO socios (nombre, descripcion,foto,activo) VALUES (?, ?, ? ,?)";
            $consulta = $this->bd->prepare($sentencia_insertarSeries);
            $consulta->bind_param("sssi", $nombre,$descripcion,$foto,$activo);
            $consulta->execute();
            $consulta->close();
        }
    
        public function Modificar_series($nombre, $descripcion,$foto,$activo){
            $sentencia_modificarSerie = "UPDATE series SET nombre = ?, descripcion = ?, foto = ?, activo = ? WHERE id = ?";
            $consulta = $this->bd->prepare($sentencia_modificarSerie);
            $consulta->bind_param("sssi", $nombre,$descripcion,$foto,$activo);
            $consulta->execute();
            $consulta->close();
        }

        public function Desactivar_series($id) {
            $sentencia_desactivarSeries = "UPDATE series SET activo = '0' WHERE id = ?";
            $consulta = $this->bd->prepare($sentencia_desactivarSeries);
            $consulta->bind_param("i", $id);
            $consulta->execute();
            $consulta->close();
        }

        public function Buscar_series($nombre) {
            $sentencia_buscarSeries = "SELECT * FROM series WHERE nombre LIKE ?";
            $consulta = $this->bd->prepare($sentencia_buscarSeries);
            $nombreBusqueda = "%{$nombre}%"; 
            $consulta->bind_param("s", $nombreBusqueda);
            $consulta->execute();
            
            $resultado = $consulta->get_result();
            $seriesEncontradas = $resultado->fetch_all(MYSQLI_ASSOC);
        
            $consulta->close();
        
            return $seriesEncontradas;
        }

        public function Buscar_seriesId($id){
            $sentencia_buscarSeriesId= "SELECT * FROM series WHERE id LIKE ?";
            $consulta = $this->bd->prepare($sentencia_buscarSeriesId);
            $nombreBusqueda = "%{$id}%";
        }

        //PLATAFORMAS:
        
        public function Insertar_plataformas($nombre, $activo, $logotipo) {
            $sentencia_insertarPlataformas = "INSERT INTO plataformas (nombre, activo, logotipo) VALUES (?, ?, ?)";
            $consulta = $this->bd->prepare($sentencia_insertarPlataformas);
            $consulta->bind_param("sss", $nombre, $activo, $logotipo);
            $consulta->execute();
            $consulta->close();
        }
        
        public function Modificar_plataformas($id, $nombre, $activo, $logotipo) {
            $sentencia_modificarPlataformas = "UPDATE plataformas SET nombre = ?, activo = ?, logotipo = ? WHERE id = ?";
            $consulta = $this->bd->prepare($sentencia_modificarPlataformas);
            $consulta->bind_param("sssi", $nombre, $activo, $logotipo, $id);
            $consulta->execute();
            $consulta->close();
        }
        
        public function Buscar_plataforma($nombre) {
            $sentencia_buscarPlataformas = "SELECT * FROM plataformas WHERE nombre LIKE ?";
            $consulta = $this->bd->prepare($sentencia_buscarPlataformas);
            $nombreBusqueda = "%{$nombre}%"; 
            $consulta->bind_param("s", $nombreBusqueda);
            $consulta->execute();
        
            $resultado = $consulta->get_result();
            $plataformasEncontradas = $resultado->fetch_all(MYSQLI_ASSOC);
        
            $consulta->close();
        
            return $plataformasEncontradas;
        }


        //SOCIOS

        public function Insertar_socios($nombre, $nick, $pass, $activo) {
            $sentencia_insertarSocios = "INSERT INTO socios (nombre, nick, pass, activo) VALUES (?, ?, ?, ?)";
            $consulta = $this->bd->prepare($sentencia_insertarSocios);
            $consulta->bind_param("ssss", $nombre, $nick, $pass, $activo);
            $consulta->execute();
            $consulta->close();
        }
        
        public function Modificar_socios($id, $nombre, $nick, $pass, $activo) {
            $sentencia_modificarSocios = "UPDATE socios SET nombre = ?, nick = ?, pass = ?, activo = ? WHERE id = ?";
            $consulta = $this->bd->prepare($sentencia_modificarSocios);
            $consulta->bind_param("ssssi", $nombre, $nick, $pass, $activo, $id);
            $consulta->execute();
            $consulta->close();
        }


        
        public function Desactivar_socios($id) {
            $sentencia_desactivarSocios = "UPDATE socios SET activo = '0' WHERE id = ?";
            $consulta = $this->bd->prepare($sentencia_desactivarSocios);
            $consulta->bind_param("i", $id);
            $consulta->execute();
            $consulta->close();
        }


        
        public function Buscar_socios($nombre) {
            $sentencia_buscarSocios = "SELECT * FROM socios WHERE nombre LIKE ?";
            $consulta = $this->bd->prepare($sentencia_buscarSocios);
            $nombreBusqueda = "%{$nombre}%"; 
            $consulta->bind_param("s", $nombreBusqueda);
            $consulta->execute();
        
            $resultado = $consulta->get_result();
            $sociosEncontrados = $resultado->fetch_all(MYSQLI_ASSOC);
        
            $consulta->close();
        
            return $sociosEncontrados;
        }
        
        


        //LANZAMIENTOS:

        public function Insertar_lanzamiento($serie, $plataforma, $fecha) {
            $sentencia_insertarLanzamiento = "INSERT INTO lanzamientos (serie, plataforma, fecha) VALUES (?, ?, ?)";
            $consulta = $this->bd->prepare($sentencia_insertarLanzamiento);
            $consulta->bind_param("iss", $serie, $plataforma, $fecha);
            $consulta->execute();
            $consulta->close();
        }
        
        public function Modificar_lanzamiento($serie, $plataforma, $fecha, $nuevaFecha) {
            $sentencia_modificarLanzamiento = "UPDATE lanzamientos SET fecha = ? WHERE serie = ? AND plataforma = ?";
            $consulta = $this->bd->prepare($sentencia_modificarLanzamiento);
            $consulta->bind_param("ssi", $nuevaFecha, $serie, $plataforma);
            $consulta->execute();
            $consulta->close();
        }
        
        public function Borrar_lanzamiento($serie, $plataforma) {
            $sentencia_borrarLanzamiento = "DELETE FROM lanzamientos WHERE serie = ? AND plataforma = ?";
            $consulta = $this->bd->prepare($sentencia_borrarLanzamiento);
            $consulta->bind_param("ii", $serie, $plataforma);
            $consulta->execute();
            $consulta->close();
        }


        //COMENTARIOS:

        public function Borrar_comentario($socio, $serie) {
            $sentencia_borrarComentario = "DELETE FROM comentario WHERE socio = ? AND serie = ?";
            $consulta = $this->bd->prepare($sentencia_borrarComentario);
            $consulta->bind_param("ii", $socio, $serie);
            $consulta->execute();
            $consulta->close();
        }

        
        public function Obtener_comentarios_serie($serie_id) {
            // Obtener todos los comentarios de una serie específica
            $sentencia_obtenerComentarios = "SELECT * FROM comentario WHERE serie = ?";
            $consulta = $this->bd->prepare($sentencia_obtenerComentarios);
            $consulta->bind_param("i", $serie_id);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $comentarios = $resultado->fetch_all(MYSQLI_ASSOC);
            $consulta->close();
    
            return $comentarios;
        }
    
        public function Añadir_comentario($socio_id, $serie_id, $fecha, $texto) {
            // Añadir un comentario
            $sentencia_añadirComentario = "INSERT INTO comentario (socio, serie, fecha, texto) VALUES (?, ?, ?, ?)";
            $consulta = $this->bd->prepare($sentencia_añadirComentario);
            $consulta->bind_param("iiss", $socio_id, $serie_id, $fecha, $texto);
            $consulta->execute();
            $consulta->close();
        }
    
        public function Borrar_comentarioSerie($socio_id, $serie_id) {
            // Borrar un comentario propio
            $sentencia_borrarComentario = "DELETE FROM comentario WHERE socio = ? AND serie = ?";
            $consulta = $this->bd->prepare($sentencia_borrarComentario);
            $consulta->bind_param("ii", $socio_id, $serie_id);
            $consulta->execute();
            $consulta->close();
        }


        // Ejemplo de función para obtener roles de un usuario
        public function Obtener_roles_usuario($usuario_id) {
            $sentencia_obtenerRoles = "SELECT roles.id, roles.nombre FROM roles_socios JOIN roles ON roles_socios.rol_id = roles.id WHERE roles_socios.socio_id = ?";
            $consulta = $this->bd->prepare($sentencia_obtenerRoles);
            $consulta->bind_param("i", $usuario_id);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $roles = $resultado->fetch_all(MYSQLI_ASSOC);
            $consulta->close();

            return $roles;
        }

        
    }

?>