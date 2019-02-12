<?php 

namespace tienda\common;
use tienda\data\Usuario;

trait CrudUsuario {
    
    function getAllUsers() {
        return $this->gestor->getRepository('\tienda\data\Usuario')->findAll();
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
        $this->gestor->persist($usuario);
        $this->gestor->flush();
        return $usuario;
    }
    
    function deleteUser($id) {
        $usuario = $this->getUser($id);
        $this->gestor->remove($usuario);
        $this->gestor->flush();
        return $usuario;
    }
    
    function getUser(array $data = ['id' => '']) {
        return $this->gestor->getRepository('\tienda\data\Usuario')->findOneBy($data);
    }
    
    function getUsers($filtro) {
        
    }
    
}