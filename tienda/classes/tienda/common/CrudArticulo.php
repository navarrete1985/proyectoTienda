<?php 

namespace tienda\common;

use tienda\data\DestinatarioArticulo;
use tienda\data\CategoriaArticulo;

trait CrudArticulo {
    
    private $repositoryName = '\tienda\data\Articulo';
    
    function addCategories($articulo, $categorias, $class) {
        $articulo = $this->gestor->getReference(get_class($articulo), $articulo->getId());
        if ($categorias !== null && is_array($categorias)) {
            foreach($categorias as $item) {
                $cat = $this->gestor->getReference($class, $item);
                $destArticulo = new CategoriaArticulo();
                $destArticulo->setCategoria($cat);
                $destArticulo->setArticulo($articulo);
                $this->create($destArticulo);
            }  
        } 
    }
    
    function addDestinatarios($articulo, $destinatarios, $class) {
        $articulo = $this->gestor->getReference(get_class($articulo), $articulo->getId());
        if ($destinatarios !== null && is_array($destinatarios)) {
            foreach($destinatarios as $item) {
                $dest = $this->gestor->getReference($class, $item);
                $destArticulo = new DestinatarioArticulo();
                $destArticulo->setDestinatario($dest);
                $destArticulo->setArticulo($articulo);
                $this->create($destArticulo);
            }  
        } 
    }
    
}