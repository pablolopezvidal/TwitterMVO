<?php

require("../model/twitterDAO.php");

$results = selectPublications($pdo, $_SESSION['ObjetoUsuario']);

// Cerrar la conexion
$pdo = null;

require("../view/twitterView.php");
?>