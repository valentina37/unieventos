<?php
use PHPUnit\Framework\TestCase;

require_once 'clases/Asistencias.php';

class AsistenciaTest extends TestCase
{
    protected function setUp(): void
    {
        // Configura lo necesario antes de cada prueba, si es necesario
    }

    protected function tearDown(): void
    {
        // Limpia lo que necesites después de cada prueba, si es necesario
    }

    public function testRegistrarAsistenciaConDocumentoValido()
    {
        $asistencia = new Asistencia();
        $documentoValido = '1095786621'; // Asegúrate de que este documento exista en la base de datos

        // Capturamos la salida usando ob_start
        ob_start();
        $asistencia->registrarAsistencia($documentoValido);
        $resultado = ob_get_clean(); // Obtener el contenido de la salida

        $this->assertIsString($resultado); // Asegúrate de que devuelve un string
        $this->assertStringContainsString('Asistencia registrada para', $resultado); // Verifica que el mensaje contenga texto esperado
    }

    public function testRegistrarAsistenciaConDocumentoInvalido()
    {
        $asistencia = new Asistencia();
        $documentoInvalido = '987654321'; // Este documento no debe existir en la base de datos

        ob_start();
        $asistencia->registrarAsistencia($documentoInvalido);
        $resultado = ob_get_clean();

        $this->assertIsString($resultado);
        $this->assertStringContainsString('no está registrado como invitado', $resultado); // Verifica que el mensaje contenga texto esperado
    }

    public function testRegistrarAsistenciaConDocumentoVacio()
    {
        $asistencia = new Asistencia();

        ob_start();
        $asistencia->registrarAsistencia('');
        $resultado = ob_get_clean();

        $this->assertIsString($resultado);
        $this->assertStringContainsString('No se proporcionó un documento válido', $resultado); // Verifica que el mensaje contenga texto esperado
    }
}
