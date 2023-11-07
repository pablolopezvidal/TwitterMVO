<?php

require("C:\Users\pc\desktop\git\TwitterMVO\model/followDAO.php");
$username= $_GET["username"];
$useridtoFOllow= $_GET["userId"];
$miUserId= $_SESSION["ObjetoUsuario"]->id;

$results = follow($pdo,$miUserId,$useridtoFOllow);

// Cerrar la conexion

header("Location: perfilUsuarioController.php?username=$username");


