<?php 

class User {
    public $id;
    protected $username;
    protected $email;
    protected $password;
    public $description;
    public $listaTweets;
    public $listaFollows; #alguna forma para hacerlo mejor

    
    public function __construct($id, $username, $email, $password, $description) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->description = $description;
        $this->listaTweets = array();
        $this->listaFollows = array();
    }

    
    public function __get($atributo) {
        return $this->$atributo;
    }
    
    public function addTweet($tweetId, $tweetData) {
        $this->listaTweets[$tweetId] = $tweetData; // Usamos $tweetId como clave
    }

    public function getListaTweets() {
        return $this->listaTweets;
    }

    public function addAmigo($amigoId, $amigoData) {
        $this->listaFollows[$amigoId] = $amigoData; // Usamos $amigoId como clave
    }

    public function getListaFollows() {
        return $this->listaFollows;
    }

}

?>