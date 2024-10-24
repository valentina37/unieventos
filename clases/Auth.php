// Validación de Usuarios y control con la base de datos
<?php 
    include "Conexion.php";

    // Función de registro para usuarios
    class Auth extends Conexion {
        public function registrar($usuario, $password) {
            $conexion = parent::conectar();
            // Query que inserta el usuario a la BD
            $sql = "INSERT INTO t_usuarios (usuario, password) 
                    VALUES (?,?)";
            //
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $usuario, $password);
            return $query->execute();
        }
    //

    // Función para el logueo del usuario
        public function logear($usuario, $password) {
            $conexion = parent::conectar();
            $data_usuario = "";
            $password_usuario = "";

            // Query para buscar un usuario existente con el nombre de usuario ingresado en el campo de login
            $sql = "SELECT * FROM t_usuarios 
                    WHERE usuario = '$usuario'";
            //
            $respuesta = mysqli_query($conexion, $sql);

            // Extracción de la contraseña desde la BD
            if (mysqli_num_rows($respuesta) > 0) {
                $data_usuario = mysqli_fetch_array($respuesta);
                $password_usuario = $data_usuario['password'];
            //
            
                // Comparación de la contraseña encontrada en la BD con la ingresada en el login
                if (password_verify($password, $password_usuario)) {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['id_usuario'] = $data_usuario['id_usuario'];
                    return true;
                } else {
                    return false;
                }
                //
            } else {
                return false;
            }
        }   
    }

?>