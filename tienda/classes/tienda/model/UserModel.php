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
    
    private $gestor;
    private $bootstrap;
    
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
    
}