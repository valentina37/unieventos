<?php
use PHPUnit\Framework\TestCase;

require_once 'clases/Conexion.php';

class ConexionTest extends TestCase
{
    protected $conexion;

    protected function setUp(): void
    {
        // Configuración inicial
        $this->conexion = new Conexion();
    }

    public function testConectar()
    {
        $resultado = $this->conexion->conectar();
        $this->assertNotFalse($resultado, "La conexión a la base de datos falló."); // Verificar que la conexión no sea falsa

        // Limpiar la conexión después de la prueba
        mysqli_close($resultado);
    }

    public function testConectarConCredencialesIncorrectas()
    {
        // Probar conexión con credenciales incorrectas
        $this->conexion->usuario = 'incorrecto'; // Usuario incorrecto
        $this->conexion->password = 'incorrecto'; // Contraseña incorrecta

        $resultado = $this->conexion->conectar();
        $this->assertFalse($resultado, "Se esperaba que la conexión fallara con credenciales incorrectas.");
    }
}
?>
