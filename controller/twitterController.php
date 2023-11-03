<?php

require("../model/twitterDAO.php");

$results = selectPublications($pdo);

// Cerrar la conexion
$pdo = null;

require("../view/twitterView.php");
?>