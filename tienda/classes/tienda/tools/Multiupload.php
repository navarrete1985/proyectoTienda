<?php

namespace tienda\tools;

class MultiUpload {
    
    const POLICITY_KEEP = 1,
          POLICITY_OVERWRITE = 2,
          POLICITY_RENAME = 3;
    
    const ERROR_EMPTY_FILES = 1001,
          ERROR_EXCEED_MAX_SIZE = 1002,
          ERROR_NOT_MULTI_FILE = 1003,
          ERROR_NOT_SET_FIELD = 1004,
          ERROR_FILE_EXIST = 1005,
          ERROR_MIME_TYPE = 1006;
          
    private $error = array(
                'class'=>0,
                'php'=>null,
            ),
            $files,
            $input,
            $items = 0,
            $maxSize = 0, 
            $multifile = false, 
            $names, 
            $policity = self::POLICITY_KEEP, 
            $saved = false,
            $savedName = '', 
            $target = './resources/images/',
            $type = '';
    
    function __construct($input) {
        $this->input = $input;
        if (is_string($input) && isset($_FILES[$input])) {
            $this->files = $_FILES[$input];
            $this->multifile = is_array($this->files['name']);
            $this->chekFiles();
        }else {
            $this->error['class'] = self::ERROR_NOT_SET_FIELD;
        }
    }
    
    private function chekFiles() {
        $pass = false;
        if($this->multifile && $this->files['name'][0] !== '') {
          $pass = true;
          $this->items = count($this->files['name']);
        }else if (!$this->multifile && $this->files['name'] !== '') {
          $pass = true;
          $this->items = 1;
        }
        
        if($pass) {
          $this->names = $this->files['name'];
          $this->error['php'] = $this->files['error'];
        }else {
          $this->error['class'] = self::ERROR_EMPTY_FILES;
        }
        
    }
    
    function getError() {
      return $this->error;
    }
    
    function getMaxSize() {
        return $this->maxSize;
    }
    
    function getNames() {
      $nombres = $this->names;
      if ($this->savedName !== '' && $this->policity !== self::POLICITY_RENAME) {
        $this->names = $this->savedName;
      }
      return $nombres;
    }
    
    function getNumberOfItems() {
        return $this->items;
    }
    
    function getPolicity() {
        return $self->policity;
    }
    
    function getSavedName() {
      return $this->savedName;
    }
    
    function getTarget() {
      return $this->target;
    }
    
    /**
     * Función que comprueba que el tipo mime del archivo sea válido
     */
    function isValidType($index) {
      $result = true;
      if ($this->type !== '') {
        if($index === -1) {
          $result = $this->__isValidType($this->files['tmp_name']);
          if(!$result) {
            $this->error['php'] = self::ERROR_MIME_TYPE;
          }
        }else {
          $result = $this->__isValidType($this->files['tmp_name'][$index]);
          if(!$result) {
            $this->error['php'][$index] = self::ERROR_MIME_TYPE;
          }
        }
      }
      return $result;
    }
    
    /**
     * Función que comprueba que el tamaño del archivo está dentro del límite seteado
     * En caso de que nos pasemos del tamMax establecido....insertamos error
     */
    function isValidSize($index) {
      $result = true;
      if ($this->maxSize !== 0) {
        if ($index === -1 && !$this->files['size'] <= $this->maxSize) {
          $result = false;
          $this->error['php'] = self::ERROR_EXCEED_MAX_SIZE;
        }else if (!$this->files['size'][$index] <= $this->maxSize) {
          $result = false;
          $this->error['php'][$index] = self::ERROR_EXCEED_MAX_SIZE;
        }
      }
      return $result;
    }
    
    function setMaxSize($maxSize) {
        if (is_int($maxSize) && $maxSize > 0) {
            $this->maxSize = $maxSize;
        }
        return $this;
    }
    
    function setPolicy ($policity) {
        if (is_int($policity) && $policity > self::POLICITY_KEEP && $policity <= self::POLICITY_RENAME) {
            $this->policity = $policity;
        }
        return $this;
    }
    
    function setSavedName($savedName) {
      if (is_string($savedName) && strlen(trim($savedName)) > 0) {
        $this->savedName = trim($savedName);
      }
      return $this;
    }
    
    function setTarget($target) {
      if (is_string($target) && strlen(trim($target)) > 0) {
        $strTarget = trim($target);
        $this->target = (substr($strTarget, -1) === '/') ? $strTarget : $strTarget . '/';
      }
      return $this;
    }
    
    function appendTarget($route) {
      $this->target .= $route;
      $result = true;
      if (!is_dir($this->target)) {
        $result = mkdir($this->target, 0777, true);
      }
      return $result;
    }
    
    function setType($type) {
      if (is_string($type)) {
        $this->type = trim($type);
      }
      return $this;
    }
    
    function upload() {
      $result = 0;
      if($this->error['class'] === 0) {
        if($this->multifile) {
          $result = $this->__multiupload();  
        }else {
          $result = $this->__upload();
        }
      }
      return $result;
    }
    
    private function __doUpload($index) {
      $result = false;
      switch($this->policity) {
          case self::POLICITY_KEEP:
              $result = $this->__doUploadKeep($index);
              break;
          case self::POLICITY_OVERWRITE:
              $result = $this->__doUploadOverwrite($index);
              break;
          case self::POLICITY_RENAME:
              $result = $this->__doUploadRename($index);
              break;
      }
      return $result;
    }
    
    private function __doUploadKeep($index) {
      $result = false;
      $name = $this->__getFileName($index);
      if(!file_exists($this->target . $name)) {
        $path = '';
        if ($index === -1) {
          $path = $this->files['tmp_name'];
        }else {
          $path = $this->files['tmp_name'][$index];
        }
        $result = move_uploaded_file($path, $this->target . $name);
      } else {
          if ($index === -1) {
            $this->error['php'] = self::ERROR_FILE_EXIST;
          }else {
            $this->error['php'][$index] = self::ERROR_FILE_EXIST;
          }
      }
      return $result;
    }
    
    private function __doUploadOverwrite($index) {
      $name = $this->__getFileName($index);
      $path = '';
      if ($index === -1) {
        $path = $this->files['tmp_name'];
      }else {
        $path = $this->files['tmp_name'][$index];
      }
      return move_uploaded_file($path, $this->target . $name);
    }
    
    private function __doUploadRename($index) {
      $name = $this-> __getFileName($index);
      $newName = $this->target . $name;
      if(file_exists($newName)) {
          $newName = self::__getValidName($newName);
      }
      $path = '';
      if ($index === -1) {
        $path = $this->files['tmp_name'];
      }else {
        $path = $this->files['tmp_name'][$index];
      }
      $result = move_uploaded_file($path, $newName);
      if($result) {
          $nombre = pathinfo($newName);
          $nombre = $nombre['basename'];
          if($index === -1) {
            $this->names = $nombre;
          }else {
            $this->names[$index] = $nombre;
          }
      }
      return $result;
    }
    
    private function __getFileName($index) {
      $name = $this->savedName;
      if ($name === '') {
        if ($index === -1) {
          $name = $this->names;
        }else {
          $name = $this->names[$index];
        }
      }
      return $name;
    }
    
    private static function __getValidName($file) {
      $parts = pathinfo($file);
      $extension = '';
      if(isset($parts['extension'])) {
          $extension = '.' . $parts['extension'];
      }
      $cont = 1;
      while(file_exists($parts['dirname'] . '/' . $parts['filename'] . '_' . $cont . $extension)) {
          $cont++;
      }
      return $parts['dirname'] . '/' . $parts['filename'] . '_' . $cont . $extension;
    }
    
    private function __isValidType($file) {
      $valid = true;
      $tipo = shell_exec('file --mime ' . $file);
      $posicion = strpos($tipo, $this->type);
      if($posicion === false) {
          $valid = false;
      }
      return $valid;
    }
    
    private function __multiupload() {
      $result = 0;
      foreach($this->files['name'] as $index=>$value) {
        if ($this->error['php'][$index] === 0 && $this->isValidSize($index) && $this->isValidType($index) && $this->__doUpload($index)) {
          $result++;
        }
      }
      return $result;
    }
    
    private function __upload() {
      $result = 0;
      if ($this->error['php'] === 0 && $this->isValidSize(-1) && $this->isValidType(-1) && $this->__doUpload(-1)) {
        $result++;
      }
      return $result;
    }
    
}