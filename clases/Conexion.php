<?php
    class Conexion {

        // "Credenciales" de conexión
        public $servidor = '172.31.95.111';
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
