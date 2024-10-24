// Función logout
<?php session_start(); 
    // Se destruye la sesión iniciada y se redirige al usuario a la página de principal
    session_destroy();
    header("location:../../index.php");
?>
//