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
  <a href="../twitter/twitter.php"><img id=logotwitter src="https://cdn.icon-icons.com/icons2/947/PNG/512/twitter-social-outlined-logo_icon-icons.com_74044.png"></a>
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
            <!--COMO HAGO PARA IMPRIMIR EL NOMBRE DE CADA TWEET? PORQUE AQUI LO QUE SE ESTA IMPRMIENDP SON LOS ATRIBUTOS DEL OBGETO, QUE PASA QUE EL OBGETO NO TIENE COMO TAL EL NOMBRE DEL QEU PUBLICO EL TWEET ENTONCES  ENTONCES COMO ACCEDO AL ESE DATO, HAGO UNA QUERY EN LA VISTA LA HAGO EN EL CONTROLADOR O QUE  -->
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
    <div class="botones"><a href="../seguidos/seguidos.php">SEGUIDOS</a></div>
  </div>
</body>
</html>