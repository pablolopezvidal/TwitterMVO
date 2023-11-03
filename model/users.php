<?php 

class User {
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $description;
    protected $listaTweets;


    public function __construct($id, $username, $email, $password, $description ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->description = $description;
        $this->listaTweets = [];
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    /*yo aqui tebngo que hacer algo de lo de ibernete ????????????*/
}

?>