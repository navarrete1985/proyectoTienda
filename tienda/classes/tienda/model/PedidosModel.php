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
    use \tienda\common\CrudPedido;
    
   function getPedidos($id,$pagina = 1, $orden = 'fechaexp', $limit = 3) {
        $dql = 'SELECT p,u  FROM tienda\data\Pedido p join p.usuario u 
        
        WHERE u.id = :id
        order by p.'. $orden .', p.numtarjeta, p.fechavalidez, p.cvv';  
        $query = $this->gestor->createQuery($dql)->setParameter('id',$id );
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        // return $paginator;
        $pedidos = array();
        foreach($paginator as $pedido) {
            $pedidos['pedido'] = $pedido->getUnset(array('usuario','detalles'));
        }
        return ['pedidos' => $pedidos, 'paginas' => $pagination->values()];
        
    }
    
    function getDetalles($id, $pagina = 1, $limit = 1){
        $iduser='37';
        // $dql = 'SELECT d  FROM tienda\data\Detalle  d join pedido p join color c join articulo a
        
        // WHERE d.id = '.$id .' AND d.idPedido = p.id AND d.idColor=c.id AND d.idArticulo=a.id';  
        $dql = 'SELECT d  FROM tienda\data\Detalle  d join pedido p on d.pedido=p.id join  color c on d.color=c.id join articulo a on d.articulo=a.id
        
        WHERE d.id = '.$id .' AND d.idPedido = p.id AND d.idColor=c.id AND d.idArticulo=a.id';  
        // $dql = 'SELECT *  FROM Pedido  where id = :id';
        $query = $this->gestor->createQuery($dql)->setParameter('id',$id )->getResult();
        // $result = $this->get('Pedido', ['id' => 1]);
        
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        // // return $paginator;
        $pedidos = array();
        foreach($query as $pedido) {
            $pedidos['pedido'] = $pedido->getUnset(array('usuario','detalles'));
        }
        echo 'resultado'. Util::varDump($pedidos);
        exit();
        return ['pedidos' => $pedidos, 'paginas' => $pagination->values()];
        
    }
    
}