<?php

require("../model/publicacionesDAO.php");

$results = selectPublications3($pdo);

// Cerrar la conexion
$pdo = null;

require("../view/publicacionesView.php");
?>