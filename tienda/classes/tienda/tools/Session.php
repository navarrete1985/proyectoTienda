<?php

namespace tienda\tools;

use tienda\tools\Util;
use tienda\app\App;
use \DateTime;

class Session {

    const USER = '__user';

    function __construct($name = null) {
        if (session_status() === PHP_SESSION_NONE) {
            if ($name !== null) {
                session_name($name);
            }
            session_start();
        }
    }
    
    function get($name) {
        $v = null;
        if(isset($_SESSION[$name])) {
            $v = $_SESSION[$name];
        }
        return $v;
    }
    
    function set($name, $value) {
        $_SESSION[$name] = $value;
        return $this;
    }
    
    function destroy() {
        session_destroy();
    }
    
    function isLogged() {
        return $this->getLogin() !== null;
    }
    
    function getLogin() {
        return $this->get(self::USER);
    }
    
    function login(\tienda\data\Usuario $user) {
        session_regenerate_id(true);
        return $this->set(self::USER, $user);
    }
    
    function logout() {
        unset($_SESSION[self::USER]);
        return $this;
    }
    
}