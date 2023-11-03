<?php

require("../model/publicacionesDAO.php");

$results = selectPublications($pdo);

// Cerrar la conexion
$pdo = null;

require("../view/publicacionesView.php");
?>