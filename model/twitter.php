<?php 

class twitter {

    protected $usuarios;
    protected $publicaciones;
   
    public function __construct() {
        $this->usuarios = [];
        $this->publicaciones = [];
       
    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}
?>