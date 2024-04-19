<?php
class VistaVideoclub {

    public function Mostrar_comentarios($comentarios) {
        // Mostrar comentarios en la interfaz
        // Puedes personalizar esto según tus necesidades
        foreach ($comentarios as $comentario) {
            echo "Fecha: {$comentario['fecha']}, Texto: {$comentario['texto']} <br>";
        }
    }


    //CONTROL DE ACCESO:

    public function Mostrar_menu($usuario_id) {
        $puedeInsertarSeries = $this->controlador->Verificar_permisos($usuario_id, 'insertar_series');
    
        if ($puedeInsertarSeries) {
            // Mostrar opción para insertar series
            echo "<a href='insertar_serie.php'>Insertar Serie</a>";
        }
    }

}
?>