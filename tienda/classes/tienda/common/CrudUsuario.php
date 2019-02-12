<?php 

namespace tienda\common;

trait CrudUsuario {
    
    function getAllUsers() {
      $usuario = new Usuario();
      $usuario = $this->gestor->getRepository('\tienda\data\Usuario')->findAll();
      return $usuario;   
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
    
}