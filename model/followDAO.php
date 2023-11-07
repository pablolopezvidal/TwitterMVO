
<?php

require_once("C:\Users\pc\desktop\git\TwitterMVO\connection\conecction.php");
include("C:\Users\pc\desktop\git\TwitterMVO\model/twitterDAO.php");

function follow($pdo,$userid1,$userId) {

try {

$statement = $pdo->prepare("INSERT INTO follows (users_id, userToFollowId) VALUES (:userid1, :userId)");
$statement->bindParam(':userid1', $userid1);
$statement->bindParam(':userId', $userId);
$statement->execute();


$nuevoUsuario = new User($userId,$_SESSION["nombrePerfilUsuario"],"","",$_SESSION["descripcionPerfilUsuario"]);
selectPublications($pdo, $nuevoUsuario);
$usuario = $_SESSION["ObjetoUsuario"];
$usuario->addAmigo($userId,$nuevoUsuario);

}catch (PDOException $e) {
echo "No se ha podido completar la transaccion";
}
}
?>