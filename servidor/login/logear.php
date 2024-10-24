

<?php session_start();

    // Se incluye la clase que maneja las funciones del sistema 
    include "../../clases/Auth.php";
    //

    // Se obtienen las credenciales ingresadas
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    //

    // Se crea una instancia para acceder a las funciones
    $Auth = new Auth();
    //

    // Si todo sale correcto, se redirige al usuario a la página de inicio
    if ($Auth->logear($usuario, $password)) {
        header("location:../../modulos/inicio.php");
    } 
    //

    // Si algo sale mal, se muestra un mensaje de error
    else {
        echo "No se pudo logear";
    }
    //

?>
