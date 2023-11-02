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
    <form action="../model/loginDAO.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required />
      <label for="password">password:</label>
      <input type="password" id="password" name="password" required />
      <input type="submit" value="Send" name="submit"/>
    </form>
    <a href="">¿No estas registrado?, iniar registro</a><!-- preguntar si en MVO estaria bien enlazando tal cual como lo hice en el normal-->
</body>
</html>