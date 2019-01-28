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
        // $usuario = Reader::read('')
        // $this->checkIsLogged();
        $usuario = Reader::readObject('tienda\data\Usuario');
        $usuario->setClave(Util::encriptar($usuario->getClave()));
        $result = $this->getModel()->createUser($usuario);
        Mail::sendActivation($usuario);
        header('Location: ' . App::BASE . 'login/main?op=signup?r=' . $result);
    }
    
    function activate(){
        
    }
    
    function registeradmin(){
        $usuario = $this->getSesion()->getLogin();
       
        $user = Reader::readObject('tienda\data\Usuario');
        $user->setClave(Util::encriptar($usuario->getClave()));
        
        if($this->getSesion()->isLogged() && $usuario->getRol()==true && $usuario->getActivo() == true ) {
            $user->setClave(Util::encriptar($usuario->getClave()));
            $result = $this->getModel()->createUser($user);
            header('Location: ' . App::BASE . 'index?op=login&r=session');      
       }
    }
    
    function dologin() {
        //1º control de sesión
        if($this->sesion->isLogged()) {
            //5º producir resultado -> redirección
            header('Location: ' . App::BASE . 'index?op=login&r=session');
            exit();
        }

        //2º lectura de datos
        $usuario = Reader::readObject('tienda\data\Usuario');
        //4º usar el modelo
        $user = $this->getModel()->login($usuario->getCorreo());
        // echo Util::varDump($user);
        
        $resultado = Util::verificarClave($usuario->getClave(),$user->getClave());
        if($usuario !== null && $usuario->getActivo()==0 && $resultado) {
            $user->setclave('');
            $this->getSesion()->login($user);
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
        $this->getSesion()->logout();
        header('Location: ' . App::BASE . 'login');
        exit();
    }
    
    function checkIsLogued() {
        if ($this->sesion->isLogged()) {
            $this->sendRedirect();
        }
    }
    
}
