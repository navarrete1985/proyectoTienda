<?php

namespace tienda\model;

use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\tools\Bootstrap;

class UserModel extends Model {
    
    use \tienda\common\Crud;
    
    function login($correo = '') {
        return $this->get('Usuario', ['correo' => $correo]);
    }
    
    function isEmailChanged($usuario) {
        
    }
    
    function activateUser($id, $correo) {
        $result = 0;
        $usuario = $this->get('Usuario', ['correo' => $correo, 'id' => $id]);
        if ($usuario !== null) {
            $usuario->setActivo(1);
            $this->gestor->persist($usuario);
            $this->gestor->flush();
            return 1;
        }
        return 0;
    }
    
}