<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Título de la página</title>
</head>
<body>
    <form action="../controller/nuevoTweetController.php" method="POST">
      <label for="nuevo_tweet">nuevo_tweet:</label>
      <input type="textarea" id="nuevo_tweet" name="nuevo_tweet" required />
      <input type="submit" value="Send" name="submit"/>

    </form>
</body>
</html>