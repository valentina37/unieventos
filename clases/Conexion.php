<?php
    class Conexion {

        // "Credenciales" de conexión
        public $servidor = '54.162.12.56';
        public $usuario = 'root';
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
