<?php

require("../model/seguidosDAO.php");

$results = selectPublications($pdo);

// Cerrar la conexion
$pdo = null;

require("../view/seguidosView.php");
?>