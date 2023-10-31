<?php

require("./model/userDAO.php");

$results = selectUsers($pdo);

// Cerrar la conexion
$pdo = null;

require("./view/usersView.php");
?>