<?php 

class Publications {
    protected $id;
    protected $userId;
    protected $text;
    protected $createDate;
    protected $nombreUsuario;

    

    public function __construct($id, $userId, $text, $createDate, $nombreUsuario ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->text = $text;
        $this->createDate = $createDate;
        $this->nombreUsuario = $nombreUsuario;


    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}

?>