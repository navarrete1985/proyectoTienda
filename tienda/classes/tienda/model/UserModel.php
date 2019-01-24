<?php

namespace tienda\model;

// use tienda\database\Database;
use tienda\data\Usuario;
use tienda\tools\Util;
// use tienda\managedata\ManageUsuario;

class UserModel extends Model {
    
    private $manage;
    
    function __construct() {
        parent::__construct();
        // $this->manage = new ManageUsuario($this->db);
    }
    
    function createUser(Usuario $usuario) {
        return $this->manage->add($usuario);
    }
    
    function updateUser(Usuario $usuario) {
        return $this->manage->editWithPassword($usuario);
    }
    
    function deleteUser($id) {
        return $this->manage->remove($id);
    }
    
    function getUser($id) {
        return $this->manage->get($id);
    }
    
    function getAllUsers() {
        return $this->manage->getAll();
    }
    
    function login($correo = '', $clave = '') {
        return $this->manage->login($correo, $clave);
    }
    
    function isEmailChanged($usuario) {
        return $this->manage->isEmailChanged($usuario);
    }
    
}