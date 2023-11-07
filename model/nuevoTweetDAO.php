<?php

    require_once ("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
    require("../model/users.php");
    session_start();

    function nuevoTweet($pdo, $text){
    
        $statement = $pdo->prepare("INSERT INTO publications (userId, text, createdate) VALUES (:userId,:descripcion,'2023-10-17')");
        $statement->bindParam(':descripcion', $text);
        $statement->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement->execute();

        if($statement){
            foreach ($statement->fetchAll() as $p) {
                $objectP = new tweet($p["id"], $p["userId"], $p["text"],$p["createDate"],$p["username"]); 
                if (!in_array($objectP, $_SESSION["ObjetoUsuario"]->listaTweets)) {
                    array_push($_SESSION["ObjetoUsuario"]->listaTweets, $objectP); #array_unshift()
                }
            }
            header("Location: ../controller/twitterController.php");
        }else{
            Header("Location: C:\Users\pc\desktop\git\TwitterMVO/errors/errors.php");
        }
    }
?>