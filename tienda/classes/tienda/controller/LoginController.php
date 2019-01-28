<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Util;
use tienda\tools\Reader;
use tienda\app\App;
use tienda\tools\Mail;


class LoginController extends Controller {
    
    function main() {
        $this->getModel()->set('login', true);
        $this->getModel()->set('twigFile', '_login.twig');
    }
    
    function signup() {
        $this->getModel()->set('twigFile', '_signup.twig');
    }
    
    function dosignup()  {
        
    }
    
    function dologin() {
        //1º control de sesión
        if($this->getSession()->isLogged()) {
            //5º producir resultado -> redirección
            header('Location: ' . App::BASE . 'index?op=login&r=session');
            exit();
        }

        //2º lectura de datos
        $usuario = Reader::readObject('tienda\data\Usuario');
        echo Util::varDump($usuario);
        exit();
        //4º usar el modelo
        $r = $this->getModel()->login();

        if($r !== false && $r->getActivo()==1) {
            $this->getSession()->login($r);
            $r = 1;
        } else {
            $r = 0;
        }
        
        //5º producir resultado -> redirección
        header('Location: ' . App::BASE . 'index?op=login&r=' . $r);
        exit();
    }
    
    function dologout() {
        //haces logout y te envia a index
        $this->getSession()->logout();
        header('Location: ' . App::BASE . 'index');
        exit();
    }
    
}
