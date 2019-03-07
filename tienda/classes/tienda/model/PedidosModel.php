<?php

namespace tienda\model;
use Doctrine\ORM\Tools\Pagination\Paginator;

use tienda\tools\Pagination;
use tienda\data\Usuario;
use tienda\data\Pedido;
use tienda\data\Detalle;
use tienda\data\Color;
use tienda\data\Articulo;
use tienda\tools\Util;
use tienda\tools\Bootstrap;

class PedidosModel extends Model {
    
    use \tienda\common\Crud;
    
   function getPedidos($id,$pagina = 1, $orden = 'fechaexp', $limit = 40) {
        $dql = 'SELECT p,u  FROM tienda\data\Pedido p join p.usuario u WHERE u.id = :id order by p.'. $orden .', p.numtarjeta, p.fechavalidez, p.cvv';  
        $query = $this->gestor->createQuery($dql)->setParameter('id',$id );
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        $pedidos = array();
        foreach($paginator as $pedido) {
            $pedidos[] = $pedido->getUnset(array('usuario','detalles'));
        }
        
        return ['pedidos' => $pedidos, 'paginas' => $pagination->values()];    
    }
    
    function getDetalles($id, $pagina = 1, $limit = 1){
        $iduser='37';
        $dql = 'SELECT p,u  FROM tienda\data\Pedido p join p.usuario u join p.detalles d WHERE d.id = '.$id.' AND u.id = 37';
   
        $pedido = $this->getQuery($dql);
        $resultado = array();
        $resultado = $pedido[0]->getUnset(array('usuario','justin'));
        
        return $resultado;
    }
    
}