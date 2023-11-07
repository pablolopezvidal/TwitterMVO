
<?php

require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
include("C:\Users\pc\desktop\git\TwitterMVO\model/twitterDAO.php");

function selectPublications2($pdo) {
    try {
        

        $statement2 = $pdo->prepare("SELECT * from users where users.id in (select userToFollowId from follows where users_id=:userId)");
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

        if (isset($_SESSION["ObjetoUsuario"]) && is_object($_SESSION["ObjetoUsuario"])) {
                foreach ($_SESSION["ObjetoUsuario"]->listaFollows as $p) {
                    if (is_object($p) && isset($p->listaTweets) && is_array($p->listaTweets)) {
                        foreach ($p->listaTweets as $q) {
                            if (is_object($q) && !in_array($q, $results)) {
                                array_push($results, $q);
                            }
                        }
                    }
                }
            }

        return $results;

    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}




