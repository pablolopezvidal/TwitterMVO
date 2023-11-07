<?php

require("C:\Users\pc\desktop\git\TwitterMVO\model/followDAO.php");
$username= $_GET["username"];
$useridtoFOllow= $_GET["userId"];
$miUserId= $_SESSION["ObjetoUsuario"]->id;

$results = follow($pdo,$miUserId,$useridtoFOllow);

// Cerrar la conexion
$pdo = null;

require("C:\Users\pc\desktop\git\TwitterMVO\controller\perfilUsuarioController.php?username=$username");


