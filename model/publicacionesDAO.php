<?php
require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model/tweets.php");
session_start();

function selectPublications($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM publications join users on publications.userId = users.id order by publications.id DESC");
        $statement->execute(); 
        $results = [];
        foreach ($statement->fetchAll() as $p) {
            $objectP = new tweet($p["id"], $p["userId"], $p["text"],$p["createDate"], $p["username"]);
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


/*lo unico que tengo que hacer es meter estos putos tweets en el puto usuario 
pero en que momento inicializo el usuario y como lo utilizo en las diferentes pestañas
*/