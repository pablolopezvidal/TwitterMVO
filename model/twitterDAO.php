<?php
require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model/tweets.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model\users.php");

session_start();

function selectPublications($pdo, User $usuario) {
    try {
        $statement = $pdo->prepare("SELECT * FROM publications join users on publications.userId = users.id where userId=:userId order by publications.id DESC");
        $statement->bindParam(':userId', $usuario->id);
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            $objectP = new tweet($p["id"], $p["userId"], $p["text"],$p["createDate"],$p["username"]); 
            array_push($results, $objectP);
            if (!in_array($objectP, $usuario->listaTweets)) {
                array_push($usuario->listaTweets, $objectP); #array_unshift()
            }
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


