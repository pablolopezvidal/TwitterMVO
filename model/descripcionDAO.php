<?php

    require_once ("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
    require("../model/users.php");
    session_start();

    function cambioDesc($pdo, $text){
    
        $statement = $pdo->prepare("UPDATE users SET description = :description WHERE id = :userId");
        $statement->bindParam(':description', $text);
        $statement->bindParam(':userId', $_SESSION["ObjetoUsuario"]->id);
        $statement->execute();

        if($statement){
            $_SESSION["ObjetoUsuario"]->description=$text;
            header("Location: ../controller/twitterController.php");
        }else{
            Header("Location: C:\Users\pc\desktop\git\TwitterMVO/errors/errors.php");
        }
    }
   
    
?>