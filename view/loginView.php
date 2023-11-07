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
    if (isset($_SESSION["error_login"])){
      echo $_SESSION["error_login"];
      $_SESSION['error_login'] = null; 
    }
    if (isset($_SESSION["completado"])){
      echo $_SESSION["completado"];
      $_SESSION['error_login'] = null;
    }
    ?>
    <form action="../controller/loginController.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required />
      <label for="password">password:</label>
      <input type="password" id="password" name="password" required />
      <input type="submit" value="Send" name="submit"/>
    </form>
    <a href="../view/registroView.php">¿No estas registrado?, iniar registro</a>
</body>
</html>