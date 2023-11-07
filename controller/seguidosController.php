<?php

require("../model/seguidosDAO.php");

$results = selectPublications2($pdo);

// Cerrar la conexion
$pdo = null;

require("../view/seguidosView.php");
?>