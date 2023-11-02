<?php
require_once("./connection/conecction.php");
require("./model/users.php");
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

        if ($statement && mysqli_num_rows($statement) == 1) {
            $usuario = mysqli_fetch_assoc($statement);
    
            if (password_verify($password, $usuario["password"])) { /*aqui se pone el nombre que tiene la columna en la tablade de mysql para comparar la encriptada con al que se le ha dado el el formulario*/
                $_SESSION["usuario"] = $usuario;
                header("Location: ../errors/bien_login.php");
            } else {
                $_SESSION["error_login"] = "Login incorrecto";
                header("Location: ../errors/error_login.php");
            }
        } else {
            $_SESSION["error_login"] = "Login incorrecto";
            header("Location: ../errors/error_login.php");/*aqui cuando se vulve al index se vuelve a ejecutar de arriba a abajo por eso se imprime el mensaje*/
        }
        
    }catch (PDOException $e) {
        echo "No se ha podido logear";
    }
}
?>
