<?php
require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model\publications.php");
session_start();

function selectPublications($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM social_network.publications join users on publications.userId = users.id where userId in(SELECT userToFollowId FROM social_network.follows where users_id=:userId)");
        $statement->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement->execute(); 
        $results = [];
        foreach ($statement->fetchAll() as $p) {
            $objectP = new Publications($p["id"], $p["userId"], $p["text"],$p["createDate"], $p["username"]);
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

