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

class ProductosModel extends Model {
    
    use \tienda\common\Crud;
    use \tienda\common\CrudArticulo;
    
   
    function getDoctrineZapatos($pagina = 1, $orden = 'marca', $limit = 1) {
         $dql = 'select c from tienda\data\Articulo c where c.marca < :marca 
                    order by c.'. $orden .', c.marca, c.modelo, c.precio, c.peso,c.referencia,c.coleccion';
        $query = $this->gestor->createQuery($dql)->setParameter('marca', 'zz');
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        $zapatos = array();
        
        foreach($paginator as $zapato) {
            if ($zapato->getImg() !== null) {
                $img = base64_encode(stream_get_contents($zapato->getImg()));
                $etiqueta = $img;
                $zapato->setImg($etiqueta);    
            }
            $text =  Util::excerpt($zapato->getDetalle(),130);
            $zapato->setDetalle($text);
            $zapatos[] = $zapato->getUnset(array('colores', 'categorias', 'destinatarios', 'stocks','peso','coleccion', 'detalles','material','estampando','cierre','tipo','paisfabricacion','altura','temporada','formatacon','puntera','alto','ancho','profundo','numbolsillos','otrascaracteristicas'));
        }
        
        return ['zapatos' => $zapatos, 'paginas' => $pagination->values()];
    }
    
    function getElementsArray($items, $method) {
        $result = [];
        $all = $method . 's';
        $elements = $items->$all();
        
        foreach ($elements as $item) {
            $result[] = $item->$method()->getUnset(['articulos']);
        }
        return $result;
    }
    
    // function getDestinatariosArray($categories) {
    //     $categoariasR = [];
    //     $categoriasArticulo = $product->getCategorias();
        
    //     foreach ($categoriasArticulo as $categoria) {
    //         $categoariasR[] = $categoria->getCategoria()->getUnset(['articulos']);
    //     }
    //     return $categoariasR;
    // }
}