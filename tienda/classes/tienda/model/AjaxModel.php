<?php

namespace tienda\model;

use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\tools\Bootstrap;
use tienda\tools\Pagination;

class AjaxModel extends Model {
    
    use \tienda\common\Crud;
    use \tienda\common\CrudUsuario;
    use \tienda\common\CrudArticulo;
    use \tienda\common\CrudCategoria;
    use \tienda\common\CrudColor;
    use \tienda\common\CrudPedido;
    
    function getDoctrineUsuarios($pagina = 1, $orden = 'name', $limit = 10) {
        // $gestor = $this->getDatabase();
        // $dql = 'select c from tienda\data\Usuario c where c.nombre < :nombre 
        // order by c.'. $orden .', c.nombre, c.correo, c.apellidos, c.alias,c.direccion,c.activo,c.rol,c.fechaalta ,c.id';
        // $query = $gestor->createQuery($dql)->setParameter('nombre', 'zz');
        // $paginator = new Paginator($query);
        // $paginator->getQuery()
        //     ->setFirstResult($limit * ($pagina - 1))
        //     ->setMaxResults($limit);
        // $pagination = new Pagination($paginator->count(), $pagina, $limit);
        // //return $paginator;
        // $ciudades = array();
        // foreach($paginator as $user) {
        //     $ciudades[] = $user->get();
        // }
        return ['usuarios' => $this->getAll('Usuario')];
        
    }
}