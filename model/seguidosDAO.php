<?php
require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model/tweets.php");
require("C:\Users\pc\desktop\git\TwitterMVO\model\users.php");
require("C:/Users/pc/desktop/git/TwitterMVO/model/twitterDAO.php");
require("C:\Users\pc\desktop\git\TwitterMVO\controller/twitterController.php");
session_start();

function selectFollows($pdo, user $usuario) {
    try {
        $statement = $pdo->prepare("select * from users join follows on users.id = follows.users_id where follows.users_id=:userId");
        $statement->bindParam(':userId', $_SESSION['usuario']['id']);
        $statement->execute(); 
        $statement2 = $pdo->prepare("SELECT * FROM social_network.publications join users on publications.userId = users.id where userId in(SELECT userToFollowId FROM social_network.follows where users_id=:userId)");
        $statement2->bindParam(':userId', $_SESSION['usuario']['id']);

        $results = [];
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
}

