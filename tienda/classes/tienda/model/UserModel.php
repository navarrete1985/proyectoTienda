<?php

namespace tienda\model;

use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\tools\Bootstrap;

class UserModel extends Model {
    
    use \tienda\common\Crud;
    use \tienda\common\CrudUsuario;
    
    function login($correo = '') {
        return $this->get('Usuario', ['correo' => $correo]);
    }
    
    function isEmailChanged($usuario) {
        
    }
    // function getCategoriasActivas($idarticulo){
    //     $todas = $this->getAll('Categoria');
    //     $activas = $this->get('CategoriaArticulo', ['articulo' => $idarticulo]);
        
    //     $resultado = array();
    //     foreach($todas as $clave => $categoria) {
            
    //         if($todas[$clave]['id'] == $activas[$clave]['categoria']){
    //             $cat = $categoria->getUnset(array('articulos',));
    //             $cat['activo'] = 1;
    //             $resultado[] = $cat;
    //         }else{
    //             $resultado[] = $categoria->getUnset(array('articulos',));
    //         }
            
    //     }
    //     echo Util::varDump($resultado);
        
    //     exit();
        
    // }
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