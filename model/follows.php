<?php 

class Follows {
    protected $userId;
    protected $userToFollowId;

    public function __construct($userId, $userToFollowId) {
        $this->userId = $userId;
        $this->userToFollowId = $userToFollowId;

    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}

?>