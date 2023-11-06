<?php
require_once("../connection/conecction.php");
require("../model/users.php");
session_start();


function loginUser($pdo) {
    try {

        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = trim($_POST["username"]);
            $password = $_POST["password"];
        } else{
            header("Location: ../errors/error_login1.php");
        }
        $statement = $pdo->query("SELECT * FROM users WHERE username = '$username'");
        echo gettype($statement);
        var_dump($statement);
        $numFilas = $statement->rowCount();

        if ($statement && $numFilas == 1) {
            $usuario = $statement->fetchAll()[0];

            /*
            echo $usuario;
            var_dump($usuario);
            echo $usuario["password"];
            $_SESSION["usuario"] = $usuario;
            */

            if ($password == $usuario["password"]) { #aqui se pone el nombre que tiene la columna en la tablade de mysql para comparar la encriptada con al que se le ha dado el el formulario
                $_SESSION["usuario"] = $usuario;
                $_SESSION["ObjetoUsuario"] = new User($_SESSION['usuario']['id'],$_SESSION['usuario']['username'],$_SESSION['usuario']['email'],$_SESSION['usuario']['password'],$_SESSION['usuario']['description']);
                header("Location: ../controller/twitterController.php");
            } else {
                $_SESSION["error_login"] = "Login incorrecto wachoo";
                header("Location: ../view/loginView.php");
            }
        } else {
            $_SESSION["error_login"] = "Login incorrecto";
            header("Location: ../errors/error_login.php");#aqui cuando se vulve al index se vuelve a ejecutar de arriba a abajo por eso se imprime el mensaje
        }
        
    }catch (PDOException $e) {
        echo "No se ha podido logear";
    }
}

?>
