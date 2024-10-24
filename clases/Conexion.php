<?php
    class Conexion {

        // "Credenciales" de conexión
        public $servidor = 'unieventos.chyqgm60qwri.us-east-1.rds.amazonaws.com';
        public $usuario = 'admin';
        public $password = 'jodahezo27?';
        public $database = 'unieventos';
        public $port = 3306;
        // 

        /* Función para conectarse a la BD */
        public function conectar() {
            return mysqli_connect(
                $this->servidor,
                $this->usuario,
                $this->password,
                $this->database,
                $this->port
            );
        }
    }

?>
