<?php

require("./model/loginDAO.php");

$results = loginUser($pdo);

// Cerrar la conexion
$pdo = null;

require("./view/loginView.php");
?>

