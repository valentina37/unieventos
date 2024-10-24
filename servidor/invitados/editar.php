<?php session_start();

include "../../clases/Invitados.php";
$Invitados = new Invitado();
$id_invitado = $_POST['id_invitado'];
echo json_encode($Invitados->editarInvitado($id_invitado));

?>