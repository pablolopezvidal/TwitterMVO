<?php 

class Publications {
    protected $id;
    protected $userId;
    protected $text;
    protected $createDate;

    public function __construct($id, $userId, $text, $createDate ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->text = $text;
        $this->createDate = $createDate;

    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}

?>