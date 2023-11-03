<?php
require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model\publications.php");
session_start();

function selectPublications($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM publications join users on publications.userId = users.id order by publications.id DESC");
        $statement->execute(); 
        $results = [];
        foreach ($statement->fetchAll() as $p) {
            $objectP = [$p["id"], $p["userId"], $p["text"],$p["createDate"],$p["username"]];# la solucion que propongo es en vez de crear un obgeto publicacion como tal creo un ibject que sea un array que si tenga en nombre entre sus partes y envio eso
            #porque tengo que crear los obgetos de las publicaciones propias si ya estan en la base ddatos 
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}