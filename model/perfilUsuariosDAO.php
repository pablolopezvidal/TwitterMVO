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
            $_SESSION["descripcionPerfilUsuario"] = $p["description"];#hay alguna forma de hacer esto mejor pq esta feo tener eso ahi, funciona por que cada vez que se itera es la misma descripcion pero lo estoy modificando todo el rato sabes
            $_SESSION["createdateperfilPerfilUsuario"] = $p["creacionPerfil"];#hay alguna forma de hacer esto mejor pq esta feo tener eso ahi, funciona por que cada vez que se itera es la misma descripcion pero lo estoy modificando todo el rato sabes
            $_SESSION["idPerfilUsuario"] = $p["userId"];
            #aqui deberia comprobar si esta dentro del array de tweets de la clase twitter y si no esta pues se mete el tweet
        }
        $_SESSION["nombrePerfilUsuario"] = $nombreusuario;


        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}
