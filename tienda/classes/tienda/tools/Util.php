<?php

namespace tienda\tools;

use tienda\app\App;

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
    
    static function getBlobImage($img, $compress = 50) {
        //Abrimos el flujo de salida
        ob_start();
        //Generamos la imagen a partir del string que se nos pasó por post
        $img_blob = imagecreatefromstring($img);
        //Realizamos la compresión que queramos de la imagen y la metemos en el buffer
        imagejpeg($img_blob,NULL,$compress);
        //Vaciamos el buffer de salida y recogemos el blob generado
        $blob = ob_get_contents();
        //Cerramos el flujo
        ob_end_clean(); 
        return $blob;
    }
    
    static function excerpt($text, $length) {
        if (strlen($text) > $length) {
            return substr($text, 0, $length) . '[...]';
        }
        return $text;
    }
    
    static function getImagesUrls($folder) {
        $images = [];
        $gestor_dir = opendir($folder);
        
        while (false !== ($fichero = readdir($gestor_dir))) {
            if ($fichero !== '.' && $fichero !== '..') {
                $images[] = App::BASE . $folder . '/' . $fichero;    
            }
        }
        return $images;
    }
}