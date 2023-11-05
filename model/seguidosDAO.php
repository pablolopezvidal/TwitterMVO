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
            #si yo creo aqui todos los usuarios que sigo y los meto en mi array de gente que sifgo por mucho que yo tengra dentro de la lista la gente que sigo sus lista de twiits estaran vacias 
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

