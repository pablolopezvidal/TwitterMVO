<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="view\estilos.css">
  <title>Título de la página</title>
</head>

<body>
  <div id="barra_superior">
  </div>
  <div id="informacion">
    <div id="informacion_uno">
        <div id="fotoperfil"></div>
        <h1><?=($_SESSION['usuario']['username']);?></h1>
    </div>
    <div id="informacion_dos">
      <h3><?=($_SESSION['usuario']['description']);?></h3>
      <h3>||</h3>
      <h3><?=($_SESSION['usuario']['createDate']);?></h3>
    </div>
  </div>
  <h1>Tweets</h1>
  <div id="contenido">
      <?php foreach ($results as $i):?>
        <div class="caja">
              <h3><?= $i->nombreUsuario;?></h3>
              <h3><?= $i->text;?></h3>
              <h3><?= $i->createDate;?></h3>
        </div>  
      <?php endforeach;?>
  </div>
  <div id="barra_inferior">
    <div class="botones"><a href="../twitear/twitear.php">PUBLICAR</a></div>
    <div class="botones"><a href="../descripcion/cambiardesc.php">DESCRIPCION</a></div>
    <div class="botones"><a href="../controller/publicacionesController.php">MUNDO</a></div>
    <div class="botones"><a href="../controller/seguidosController.php">SEGUIDOS</a></div>
  </div>



  <h1>usuarios</h1>
  <?php 
    var_dump($_SESSION['usuario']);
    #$usuario.get
  ?>
  <h1>id</h1>
  <?php 
    var_dump($_SESSION['usuario']['id']);
  ?>
  <h1>username</h1>
  <?php 
    var_dump($_SESSION['usuario']['username']);
  ?>
  <h1>email</h1>
  <?php 
    var_dump($_SESSION['usuario']['email']);
  ?>
  <h1>password</h1>
  <?php 
    var_dump($_SESSION['usuario']['password']);
  ?>
  <h1>pass</h1>
  <?php 
    var_dump($_SESSION['usuario']['password']);
  ?>      
</body>
</html>

