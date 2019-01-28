<?php

namespace tienda\model;

use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\tools\Bootstrap;

// $bs = new Bootstrap();
// $gestor = $bs->getEntityManager();

// $destinatario = new \izv\data\Destinatario();
// $destinatario->setNombre('niño');
// $gestor->persist($destinatario);

class UserModel extends Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
    function createUser(Usuario $usuario) {
        $bootstrap = new Bootstrap();
        $gestor = $bootstrap->getEntityManager();
        $r = $gestor->persist($usuario);
        $gestor->flush();
        return $r;
    }
    
    function updateUser(Usuario $usuario) {
        
    }
    
    function deleteUser($id) {
        
    }
    
    function getUser($id) {
        
    }
    
    function getAllUsers() {
      $bootstrap = new Bootstrap();
      $gestor = $bootstrap->getEntityManager();
      $usuario = new Usuario();
      $usuario = $gestor->getRepository('\tienda\data\Usuario')->findAll();
      return $usuario;   
    }
    
    function login($correo = '') {
        $bootstrap = new Bootstrap();
        $gestor = $bootstrap->getEntityManager();
        $usuario = new Usuario();
        $usuario->setCorreo($correo);
        // $usuario = $this->gestor->find('usuario',1)
        // $query = $gestor->createQuery('SELECT * FROM \tienda\data\Usuario  WHERE correo = '.$correo);
        // $users = $query->getResult();
        // echo Util::varDump($users);
        
        
        
        $usuario = $gestor->getRepository('\tienda\data\Usuario')->findOneBy(array('correo' => $correo));

        // return $usuarios[0];
        return $usuario;
        
    }
    
    function isEmailChanged($usuario) {
        
    }
    
    function activateUser($id, $code) {
        $result = 0;
        $bootstrap = new Bootstrap();
        $gestor = $bootstrap->getEntityManager();
        $usuario = $gestor->getRepository('tienda\data\Usuario')->findOneBy(array('correo' => $code, 'id' => $id));
        if ($usuario !== null) {
            // echo Util::vaDump($usuario);
            // exit();
            $usuario->setActivo(1);
            $gestor->persist($usuario);
            $gestor->flush();
            // $result = 1;
            return 1;
        }
        // echo $result;
        // exit();
        return 0;
    }
    
}