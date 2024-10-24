<?php session_start();

include "../../clases/Invitados.php";
$Invitados = new Invitado();
$id_invitado = $_POST['id_invitado'];
echo $Invitados->eliminarInvitado($id_invitado);


?>