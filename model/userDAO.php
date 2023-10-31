<?php
require_once("./connection/conecction.php");
require("./model/users.php");

function selectUsers($pdo) {
    try {
        //Hacemos la query
        $statement = $pdo->query("SELECT id, username, email, password, description FROM users");

        $results = [];
        foreach ($statement->fetchAll() as $p) {
            $objectP = new User($p["id"], $p["username"], $p["email"],$p["password"],$p["description"]);
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

?>
