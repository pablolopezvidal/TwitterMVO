<?php

require("C:\Users\pc\desktop\git\TwitterMVO\model\perfilUsuariosDAO.php");
$username= $_GET["username"];

$results = selectPerfilUsuario($pdo, $username);

// Cerrar la conexion
require("C:\Users\pc\desktop\git\TwitterMVO/view\perfilUsuariosView.php");

$pdo = null;

?>