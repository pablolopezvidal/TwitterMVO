<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <title>Título de la página</title>
</head>
<style>
  body{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    justify-content: center;
    align-items: center;
}
#barra_inferior{
    position: sticky;
    bottom: 0;
    background-color: rgb(255, 255, 255);
    width: 100vw;
    height: 10vh;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;

}
#barra_superior{
    position: sticky;
    top: 0;
    background-color: #00acee;
    width: 100vw;
    height: 10vh;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}

#contenido{
    width: 90vw;
    min-height: 100vh;
    height: auto;
    margin: 20px;
    border-radius: 20px;
}
#informacion{
    width: 90vw;
    height: auto;
    margin: 20px;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
}
.botones{
    width: 25%;
    height: 100%;
    background-color: rgb(255, 255, 255);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    color: #00acee;
    padding: 3px;
}
.botones:hover{
    background-color: #00acee;
    color: #ffffff;
    transition: 1s;
}

#informacion_uno{
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: row;
    gap: 10px;
    padding: 5px;  
    margin: 0;
}
#informacion_dos{
    width: 100%;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: row;
    gap: 10px;
}
#fotoperfil{
    background: #00acee;
    border-radius: 50%;
    width: 100px;
    height: 100px;
}
.caja{
    width: 100%;
    height: auto;
    border-top: 1px solid black;
    display: flex;
    flex-direction: column;
}
a{
    text-decoration: none;
}
#logotwitter{
    height: 80px;
    width: 80px;   
}
</style>
<body>
  <div id="barra_superior">
  </div>
  <div id="informacion">
    <div id="informacion_uno">
        <div id="fotoperfil"></div>
        <h1><?=($_SESSION["ObjetoUsuario"]->username);?></h1>
    </div>
    <div id="informacion_dos">
      <h3><?=($_SESSION["ObjetoUsuario"]->description);?></h3>
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
    <div class="botones"><a href="../view/nuevoTweetView.php">PUBLICAR</a></div>
    <div class="botones"><a href="../view/descripcionView.php">DESCRIPCION</a></div>
    <div class="botones"><a href="../controller/publicacionesController.php">MUNDO</a></div>
    <div class="botones"><a href="../controller/seguidosController.php">SEGUIDOS</a></div>
  </div>



  <h1>usuarios</h1>
  <?php 
    var_dump($_SESSION['ObjetoUsuario']);
    #$usuario.get
  ?>
    <h1>ObjetoUsuario///id</h1>

   <?php 
    var_dump($_SESSION['ObjetoUsuario']->id);
    #$usuario.get
  ?>
  <h1>results</h1>
  <?php 
    var_dump($results);
    #$usuario.get
  ?>
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

