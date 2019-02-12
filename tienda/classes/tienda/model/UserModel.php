<?php

namespace tienda\model;

use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\tools\Bootstrap;

class UserModel extends Model {
    
    use \tienda\common\CrudUsuario;
    
    function login($correo = '') {
        return $this->getUser(['correo' => $correo]);
    }
    
    function isEmailChanged($usuario) {
        
    }
    
    function activateUser($id, $correo) {
        $result = 0;
        $usuario = $this->getUser(['correo' => $correo, 'id' => $id]);
        if ($usuario !== null) {
            $usuario->setActivo(1);
            $this->gestor->persist($usuario);
            $this->gestor->flush();
            return 1;
        }
        return 0;
    }
    
}