<?php 

namespace tienda\common;
use tienda\tools\Util;
use tienda\app\App;

trait Crud {
    
    private $prefix = '\tienda\data\\';
    
    function get($clase, array $data = ['id' => '']) {
        return $this->gestor->getRepository($this->prefix . $clase)->findOneBy($data);
    }
    
    function getQuery(){
        $query = $this->gestor->createQuery('SELECT d  FROM tienda\data\Detalle d join pedido p join usuario u 
        where d.id = 1 AND u.id = 37');
        $result = $query->getResult();
        return $result;
    }
    function getAll ($clase) {
        return $this->gestor->getRepository($this->prefix . $clase)->findAll();
    }
    
    function create($item) {
        $result = 1;
        try {
            $r = $this->gestor->persist($item);
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
    
    /**
     * Función genérica para actualización de objetos en nuestra bd
     * 
     * @param Object Objeto a actualizar de nuestros tipos de datos de la bd
     * @return Object Objeto que apunta a la bd con los valores actualizados
     * 
     */
    function update ($item) {
        $after = $this->__update($item);
        $this->gestor->persist($after);
        $this->gestor->flush();
        return $after;
    }
    
    /**
     * Función encargada de devolver un objeto de nuestra base de datos
     * con los datos del objeto pasado como parámetro, para que así podamos actualizarlo
     * 
     * @param Object $item Objeto con valores modificados
     * @return Object $after Objeto que apunta a la bd con los valores cambiados a actualizar
     * 
     */ 
    private function __update($item) {/*Le pasamos el item que recogemos*/
        /*Conseguimos la clase */
        $class = get_class($item);
        $class = explode('\\', $class);
        $class = end($class);
        $before = $this->get($class, ['id' => $item->getID()]);
        $values = $item->getUnset(App::RELATIONSHIP[$class]);
        foreach ($values as $key=>$value) {
            if ($value !== null && $value !== '') {
                $value = is_string($value) ? trim($value) : $value;
                $before->setObject($key, $value);
            }
        }
        return $before;
    }
    
    function delete($clase, $id) {
        $item = $this->get($clase, ['id' => $id]);
        $this->gestor->remove($item);
        $this->gestor->flush();
        return $item;
    }
    
}