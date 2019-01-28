<?php

namespace tienda\tools;

class Util {

    static function encriptar($cadena, $coste = 10) {
        $opciones = array(
            'cost' => $coste
        );
        return password_hash($cadena, PASSWORD_DEFAULT, $opciones);
    }
    
    static function getDateFromMySqlToEs($mySqlDate) {
        date_default_timezone_set('Europe/Madrid');
        if ($mySqlDate === null) {
            return null;
        }
        return date("d/m/Y", strtotime($mySqlDate));
    }
    
    static function dateFromSql($date) {
        return 'formato europeo de la fecha';
    }

    static function url() {
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $parts = pathinfo($url);
        return $parts['dirname'] . '/';
    }

    static function varDump($value) {
        return '<pre>' . var_export($value, true) . '</pre>';
    }

    static function verificarClave($claveSinEncriptar, $claveEncriptada) {
        return password_verify($claveSinEncriptar, $claveEncriptada);
    }
    
    static function encode($key, $data) {
        return openssl_encrypt($data, 'aes-128-gcm', $key);
    }
    
    static function decode($key, $data) {
        if (!isset($key) || !isset($data)){
            return '';
        }
        return openssl_encrypt($data, 'aes-128-gcm', $key);
    }
    
    function keygen($length=10){
    	$key = '';
    	list($usec, $sec) = explode(' ', microtime());
    	mt_srand((float) $sec + ((float) $usec * 100000));
    	
       	$inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));
    
       	for($i=0; $i<$length; $i++)
    	{
       	    $key .= $inputs{mt_rand(0,61)};
    	}
    	return $key;
    }

}