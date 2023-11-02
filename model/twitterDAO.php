<?php
require_once("./connection/Connection.php");
require("./model/publications.php");
session_start();

function selectPublications($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM publications WHERE userId=:userId");
        $statement->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement->execute();#esto pq es asi 
        $results = [];
        foreach ($statement->fetchAll() as $p) {
            $objectP = new Publications();#porque tengo que crear los obgetos de las publicaciones propias si ya estan en la base ddatos 
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

?>