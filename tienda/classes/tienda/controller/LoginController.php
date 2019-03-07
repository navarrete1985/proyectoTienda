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
        if ($this->sesion->isLogged()) {
            $this->sendRedirect('admin/main');
        }
        $this->getModel()->set('login', true);
        $this->getModel()->set('twigFile', '_login.twig');
    }
    
    function signup() {
        $this->getModel()->set('twigFile', '_signup.twig');
    }
    
    function dosignup()  {
        $usuario = Reader::readObject('tienda\data\Usuario');
        $usuario->setClave(Util::encriptar($usuario->getClave()));
        $result = $this->getModel()->create($usuario);
        Mail::sendActivation($usuario);
        $this->sendRedirect(($result == 1) ? 'login/main' : 'login/signup' . '?op=signup?r=' . $result);
    }
    
    function activate(){
        if ($this->sesion->isLogged()) {
            $this->sendRedirect();
        }
        $code = Reader::read('code');
        $id = Reader::read('id');
        $mailDecode = \Firebase\JWT\JWT::decode($code, App::JWT_KEY, array('HS256'));
        $result = $this->getModel()->activateUser($id, $mailDecode);
        $this->sendRedirect('login/main?op=activate&result=' . $result);
    }
    
    function registeradmin(){
        $usuario = $this->getSesion()->getLogin();
       
        $user = Reader::readObject('tienda\data\Usuario');
        $user->setClave(Util::encriptar($usuario->getClave()));
        
        if($this->getSesion()->isLogged() && $usuario->getRol()==true && $usuario->getActivo() == true ) {
            $user->setClave(Util::encriptar($usuario->getClave()));
            $user->setActivo($user->getActivo()=='on'?1:0);
            $user->setRol($user->getRol()=='on'?1:0);
            $result = $this->getModel()->createUser($user);
            $this->sendRedirect('admin?op=login&r=session');
       }
    }
    
    function dologin() {
        if($this->sesion->isLogged()) {
            header('Location: ' . App::BASE . 'admin?op=login&r=session');
            exit();
        }
        
        $usuario = Reader::readObject('tienda\data\Usuario');
        $user = $this->getModel()->login($usuario->getCorreo());
        
        if ($user !== null) {
            $resultado = Util::verificarClave($usuario->getClave(), $user->getClave());
            
            if($usuario !== null && $user->getActivo() && $resultado) {
                $user->setclave('');
                $this->getSesion()->login($user);
                $this->sendRedirect('index/main?op=login&resultado=1');
            }
        }
        $this->sendRedirect('login/main?op=login&resultado=0');
    }
    
    function dologout() {
        $this->getSesion()->logout();
        $redirect = Reader::read('redirect');
        if ($redirect === 'main') {
            $this->sendRedirect();
        }
        $this->sendRedirect('tienda/main');
    }
    
    function checkIsLogued() {
        if ($this->sesion->isLogged()) {
            $this->sendRedirect();
        }
    }
}
