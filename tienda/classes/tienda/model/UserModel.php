<?php

namespace tienda\model;

use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\tools\Bootstrap;

class UserModel extends Model {
    
    private $bootstrap,
             $gestor;
    
    function __construct() {
        parent::__construct();
        $this->bootstrap = new Bootstrap();
        $this->gestor = $this->bootstrap->getEntityManager();
    }
    
    function createUser(Usuario $usuario) {
        $result = 1;
        try {
            $r = $this->gestor->persist($usuario);
            $this->gestor->flush();
            return $r;    
        }catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e){
            $result = -1;
        }    
        catch(\Exception $e){
            $result = 0;
        }
        return $result;
    }
    
    function updateUser(Usuario $usuario) {
        
    }
    
    function deleteUser($id) {
        
    }
    
    function getUser($id) {
        
    }
    
    function getAllUsers() {
      $usuario = new Usuario();
      $usuario = $this->gestor->getRepository('\tienda\data\Usuario')->findAll();
      return $usuario;   
    }
    
    function login($correo = '') {
        $usuario = new Usuario();
        $usuario->setCorreo($correo);
        $usuario = $this->gestor->getRepository('\tienda\data\Usuario')->findOneBy(array('correo' => $correo));
        return $usuario;
        
    }
    
    function isEmailChanged($usuario) {
        
    }
    
    function activateUser($id, $correo) {
        $result = 0;
        $usuario = $this->gestor->getRepository('tienda\data\Usuario')->findOneBy(array('correo' => $correo, 'id' => $id));
        if ($usuario !== null) {
            $usuario->setActivo(1);
            $this->gestor->persist($usuario);
            $this->gestor->flush();
            return 1;
        }
        return 0;
    }
    
}