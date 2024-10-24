<?php session_start();

include "../../clases/Invitados.php";
$Invitados = new Invitado();
$data = array(
    "id_evento" => $_POST['id_evento'],
    "nombre_invitado" => $_POST['nombre_invitado'],
    "documento" => $_POST['documento'],
    "email" => $_POST['email']
);

echo $Invitados->agregarInvitado($data);

?>
