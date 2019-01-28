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
        $bootstrap = new Bootstrap();
        $gestor = $gestor->getEntityManager();
    }
    
    function createUser(Usuario $usuario) {
        
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
        $usuario = new Usuario();
        $usuario = $this->gestor->find($correo);
        echo $
    }
    
    function isEmailChanged($usuario) {
        
    }
    
}