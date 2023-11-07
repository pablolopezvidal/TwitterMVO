<?php
require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model/tweets.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model\users.php");

session_start();

function selectPerfilUsuario($pdo, $nombreusuario) {
    try {
        $statement = $pdo->prepare("SELECT publications.id,publications.userId,publications.text,publications.createDate,username,users.createDate as creacionPerfil, description, userId FROM publications join users on publications.userId = users.id where username=:nombreusuario order by publications.id DESC;");
        $statement->bindParam(':nombreusuario', $nombreusuario);
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            $objectP = new tweet($p["id"], $p["userId"], $p["text"],$p["createDate"],$p["username"]); 
            array_push($results, $objectP);
            $_SESSION["descripcionPerfilUsuario"] = $p["description"];
            $_SESSION["createdateperfilPerfilUsuario"] = $p["creacionPerfil"];
            $_SESSION["idPerfilUsuario"] = $p["userId"];
        }
        $_SESSION["nombrePerfilUsuario"] = $nombreusuario;


        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}
