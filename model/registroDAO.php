<?php
require_once("../connection/conecction.php");
require("../model/users.php");
session_start();

function registroUser($pdo) {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $description = isset($_POST["description"]) ? $_POST["description"] : "";

    $arrayErrores = array();

    if (!empty($username)) {
        $usernameValidado = true;
    } else {
        $usernameValidado = false;
        $arrayErrores["username"] = "El nombre de usuario no puede ser vacío";
    }

    if (!empty($email)) {
        $mailValidado = true;
    } else {
        $mailValidado = false;
        $arrayErrores["email"] = "El correo electrónico no puede ser vacío";
    }

    if (!empty($password)) {
        $passValidado = true;
    } else {
        $passValidado = false;
        $arrayErrores["password"] = "La contraseña no puede ser vacía";
    }

    if (!empty($description)) {
        $descriptionValidado = true;
    } else {
        $descriptionValidado = false;
        $arrayErrores["description"] = "La descripción no puede ser vacía";
    }

    $statement2 = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $statement2->bindParam(':username', $username);
    $statement2->execute();
    $numRows = $statement2->fetchColumn();

    if ($numRows > 0) {
        $usernameValidado = false;
        $arrayErrores["username"] = "Este nombre de usuario ya ha sido registrado";
    }

    $guardarUsuario = false;

    if (count($arrayErrores) == 0) {
        $guardarUsuario = true;

        $passSegura = password_hash($password, PASSWORD_BCRYPT, ["cost" => 4]);

        $statement3 = $pdo->prepare("INSERT INTO users (username, email, password, description, createdate) VALUES (:username, :email, :password, :description, NOW())");
        $statement3->bindParam(':username', $username);
        $statement3->bindParam(':email', $email);
        $statement3->bindParam(':password', $passSegura);
        $statement3->bindParam(':description', $description);
        $statement3->execute();

        if ($statement3) {
            $_SESSION["completado"] = "Registro completado";
            header("Location: ../view/loginView.php");
        } else {
            $_SESSION["errores"]["general"] = "Fallo en el registro";
            header("Location: ../errors/error_login.php");
        }
    } else {
        $_SESSION["errores"] = $arrayErrores;
        header("Location: ../errors/error_login1.php");
    }
}
