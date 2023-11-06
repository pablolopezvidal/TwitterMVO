
<?php

require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
#require("C:\Users\pc\desktop\git\TwitterMVO\model/tweets.php");
#require("C:\Users\pc\desktop\git\TwitterMVO\model\users.php");
include("C:\Users\pc\desktop\git\TwitterMVO\model/twitterDAO.php");
#session_start(); comento estas tres lineas porque no hacen falta porque si las descomento no funciona nadda

function selectPublications2($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM social_network.publications join users on publications.userId = users.id where userId in(SELECT userToFollowId FROM social_network.follows where users_id=:userId)");
        $statement->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement->execute();

        $statement2 = $pdo->prepare("SELECT * from users where users.id in (select userToFollowId from follows where users_id=:userId");
        $statement2->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement2->execute();
        
        foreach ($statement2->fetchAll() as $p) {
            $objectP = new User($p["id"], $p["username"], $p["email"],$p["password"],$p["description"]); 
            if (!in_array($objectP, $_SESSION['ObjetoUsuario']->listaFollows)) {
                array_push($_SESSION['ObjetoUsuario']->listaFollows, $objectP);
                selectPublications($pdo, $objectP);
            }
        }

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            $objectP = new tweet($p["id"], $p["userId"], $p["text"],$p["createDate"],$p["username"]); 
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}






/*
require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model/tweets.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model\users.php");
require("C:/Users/pc/desktop/git/TwitterMVO/model/twitterDAO.php");
require("C:\Users\pc\desktop\git\TwitterMVO\controller/twitterController.php");
session_start();

function selectFollows($pdo) {
    try {
        
        $statement = $pdo->prepare("select * from users join follows on users.id = follows.users_id where follows.users_id=:userId");
        $statement->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement->execute(); 
        
        
        $statement2 = $pdo->prepare("SELECT * FROM social_network.publications join users on publications.userId = users.id where userId in(SELECT userToFollowId FROM social_network.follows where users_id=:userId)");
        $statement2->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement2->execute();

        $results = [];
        foreach ($statement2->fetchAll() as $p) {
            $objectP = new tweet($p["id"], $p["userId"], $p["text"],$p["createDate"],$p["username"]); 
            array_push($results, $objectP);
        }
        return $results;


        
        foreach ($statement->fetchAll() as $p) {
            $objectP = new user ($p["id"], $p["username"], $p["email"],$p["password"],$p["description"]); 
            $resultadoTweets = selectPublications($pdo,$objectP);
            $usuario->addAmigo($objectP->id,$objectP);
        }
        foreach ($statement2->fetchAll() as $p) {
            $objectP = new tweet ($p["id"], $p["userId"], $p["text"],$p["createDate"],$p["username"]); 
            array_push($results, $objectP);
        }
        return $results;
        
        
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
  
}  */?>

