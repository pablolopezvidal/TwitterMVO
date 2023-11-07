<?php

require("../model/descripcionDAO.php");
$nuevaDescripcion = $_POST['nueva_descripcion'];

cambioDesc($pdo, $nuevaDescripcion);

?>
