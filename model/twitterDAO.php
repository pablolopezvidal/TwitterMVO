<?php
require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model\publications.php");
session_start();

function selectPublications($pdo) {
    try {
        $statement = $pdo->prepare("SELECT id, userId, text, createDate FROM publications WHERE userId=:userId");
        $statement->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement->execute();#esto pq es asi 
        $results = [];
        foreach ($statement->fetchAll() as $p) {
            $objectP = new Publications($p["id"], $p["userId"], $p["text"],$p["createDate"]);
            #porque tengo que crear los obgetos de las publicaciones propias si ya estan en la base ddatos 
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}
