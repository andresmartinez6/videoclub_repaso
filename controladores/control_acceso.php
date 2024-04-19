<?php

//CONTROL DE ACCESO:

public function Verificar_permisos($usuario_id, $permiso) {
    $roles = $this->modelo->Obtener_roles_usuario($usuario_id);

    foreach ($roles as $rol) {
        $tienePermiso = $this->modelo->Verificar_permiso_rol($rol['id'], $permiso);
        if ($tienePermiso) {
            return true;
        }
    }

    return false;
}

?>
