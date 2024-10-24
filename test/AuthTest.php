<?php
use PHPUnit\Framework\TestCase;

require_once 'clases/Auth.php';

class AuthTest extends TestCase
{
    protected function setUp(): void
    {
        // Puedes agregar aquí la configuración inicial necesaria, como conectar a una base de datos de prueba
    }

    protected function tearDown(): void
    {
        // Limpieza después de cada prueba, como eliminar usuarios de prueba
        $auth = new Auth();
        $auth->logear('usuario_test', 'test_password'); // Asegúrate de limpiar si el usuario fue creado
    }

    public function testRegistrarUsuarioValido()
    {
        $auth = new Auth();
        $usuario = 'usuario_test';
        $password = password_hash('test_password', PASSWORD_DEFAULT); // Hash para simular la contraseña
        $resultado = $auth->registrar($usuario, $password);
        $this->assertTrue($resultado); // Asegúrate de que la inserción fue exitosa
    }

    public function testLogearUsuarioExistente()
    {
        $auth = new Auth();
        $usuario = 'usuario_test';
        $password = 'test_password';

        // Primero, registra un usuario para la prueba
        $auth->registrar($usuario, password_hash($password, PASSWORD_DEFAULT));

        // Intenta logear con las credenciales correctas
        $resultado = $auth->logear($usuario, $password);
        $this->assertTrue($resultado); // Asegúrate de que el inicio de sesión fue exitoso
    }

    public function testLogearUsuarioInexistente()
    {
        $auth = new Auth();
        $resultado = $auth->logear('usuario_inexistente', 'password_incorrecta');
        $this->assertFalse($resultado); // Asegúrate de que el inicio de sesión falle
    }

    public function testLogearConContrasenaIncorrecta()
    {
        $auth = new Auth();
        $usuario = 'usuario_test';
        $password = 'test_password';

        // Primero, registra un usuario para la prueba
        $auth->registrar($usuario, password_hash($password, PASSWORD_DEFAULT));

        // Intenta logear con la contraseña incorrecta
        $resultado = $auth->logear($usuario, 'contraseña_incorrecta');
        $this->assertFalse($resultado); // Asegúrate de que el inicio de sesión falle
    }
}
?>
