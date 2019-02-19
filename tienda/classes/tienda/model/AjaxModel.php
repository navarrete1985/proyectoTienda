<?php

namespace tienda\model;

use Doctrine\ORM\Tools\Pagination\Paginator;

use tienda\tools\Pagination;
use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\tools\Bootstrap;



class AjaxModel extends Model {
    
    use \tienda\common\Crud;
    use \tienda\common\CrudUsuario;
    use \tienda\common\CrudArticulo;
    use \tienda\common\CrudCategoria;
    use \tienda\common\CrudColor;
    use \tienda\common\CrudPedido;

    function getDoctrineUsuarios($pagina = 1, $orden = 'nombre', $limit = 3) {
         $dql = 'select c from tienda\data\Usuario c where c.nombre < :nombre 
        order by c.'. $orden .', c.nombre, c.correo, c.apellidos, c.alias,c.direccion,c.activo,c.rol';
        $query = $this->gestor->createQuery($dql)->setParameter('nombre', 'zz');
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        // return $paginator;
        $usuarios = array();
        foreach($paginator as $user) {
            $usuarios[] = $user->getUnset(array('clave','fechaalta','pedidos',));
        }
        return ['usuarios' => $usuarios, 'paginas' => $pagination->values()];
        
    }
    
    function  updateUser($obj,$userId){
        $usuario = $this->get('Usuario',['id' => $userId]);
        echo 'objeto'. Util::varDump($obj).'</br>';
        $usuario->setNombre($obj->getNombre());
        $usuario->setCorreo($obj->getCorreo());
        $usuario->setApellidos($obj->getApellidos());
        $usuario->setAlias($obj->getAlias());
        $usuario->setDireccion($obj->getDireccion());
        $usuario->setActivo($obj->getActivo());
        $usuario->setRol($obj->getRol());
        
        echo 'referencia'. Util::varDump($usuario).'</br>';
        return $this->update($usuario);
    }
}