<?php

require("../model/twitterDAO.php");

$usuario= new User($_SESSION['usuario']['id'],$_SESSION['usuario']['username'],$_SESSION['usuario']['email'],$_SESSION['usuario']['password'],$_SESSION['usuario']['description']);

$results = selectPublications($pdo, $usuario);

// Cerrar la conexion
$pdo = null;

require("../view/twitterView.php");
?>