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
    
    function __construct() {
        parent::__construct();
        $gestor = new Bootstrap();
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
        
    }
    
    function isEmailChanged($usuario) {
        
    }
    
}