<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <title>Título de la página</title>
</head>
<body>
    <h1>INICIO SESION</h1>
    <?php
    session_start();
    #require("../model/loginDAO.php");
    if (isset($_SESSION["error_login"])){
      echo $_SESSION["error_login"];
      $_SESSION['error_login'] = null; #meter en la vista un cacho de php esta bien??????????
    }
    ?>
    <form action="../controller/loginController.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required />
      <label for="password">password:</label>
      <input type="password" id="password" name="password" required />
      <input type="submit" value="Send" name="submit"/>
    </form>
    <a href="">¿No estas registrado?, iniar registro</a><!-- preguntar si en MVO estaria bien enlazando tal cual como lo hice en el normal-->
</body>
</html>