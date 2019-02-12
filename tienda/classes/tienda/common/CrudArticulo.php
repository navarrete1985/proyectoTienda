<?php 

namespace tienda\common;

trait CrudArticulo {
    
    private $repositoryName = '\tienda\data\Articulo';
    
    function getArticulo(array $data = ['id' => '']) {
        return $this->gestor->getRepository($this->repositoryName)->findOneBy($data);
    }
    
    function getAllArticulos ($id) {
        return $this->gestor->getRepository('\tienda\data\Articulo')->findAll();
    }
    
    function getArticulos($filtro) {
        
    }
    
    function createArticulo(Articulo $articulo) {
        $result = 1;
        try {
            $r = $this->gestor->persist($articulo);
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
    
    function updateArticulo (Articulo $articulo) {
        $this->gestor->persist($articulo);
        $this->persist();
        return $articulo;
    }
    
    function deleteArticulo($id) {
        $articulo = $this->getArticulo(['id' => $id]);
        $this->gestor->remove($articulo);
        $this->gestor->flush();
        return $articulo;
    }
    
}