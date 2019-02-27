<?php 

namespace tienda\common;
use tienda\tools\Util;
use tienda\app\App;
trait Crud {
    
    private $prefix = '\tienda\data\\';
    
    function get($clase, array $data = ['id' => '']) {
        return $this->gestor->getRepository($this->prefix . $clase)->findOneBy($data);
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
    
    function update ($item) {
        
        $before = $this->__update($item);
        $this->gestor->persist($before);
        $this->gestor->flush();
        return $before;
    }
    
    private function __update($item) {/*Le pasamos el item que recogemos*/
        /*Conseguimos la clase */
        $class = get_class($item);
        $class = explode('\\', $class);
        $class = end($class);
        $before = $this->get($class, ['id' => $item->getID()]);
        $values = $item->getUnset(App::RELATIONSHIP[$class]);
        foreach ($values as $key=>$value) {
            // echo '***key --> ' . $key . ' / valor --> ' . $value . '<br>';
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