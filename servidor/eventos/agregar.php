<?php session_start();

include "../../clases/Eventos.php";
$Eventos = new Eventos();
$data = array(
    'id_usuario' => $_SESSION['id_usuario'],
    'evento' =>  $_POST['nombre_evento'],
    'lugar' =>  $_POST['lugar'],
    'descripcion' =>  $_POST['descripcion'],
    'hora_inicio'  => $_POST['fecha'] . " " .$_POST['hora_inicio'],
    'hora_fin' => $_POST['fecha'] . " " .$_POST['hora_fin'],
    'fecha' => $_POST['fecha'],
);

echo $Eventos->agregar($data);

?>
