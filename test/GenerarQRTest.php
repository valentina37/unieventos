<?php
use PHPUnit\Framework\TestCase;

require_once 'clases/GenerarQR.php';

class GenerarQRTest extends TestCase
{
    protected $generarQR;

    protected function setUp(): void
    {
        $this->generarQR = new GenerarQR();
        // Puedes inicializar datos de prueba aquí si es necesario
    }

    public function testVerificarYGenerarQRConDocumentoValido()
    {
        // Asegúrate de que hay un documento válido en tu base de datos
        $documentoValido = '123456789'; // Cambia esto al documento válido

        ob_start();
        $this->generarQR->verificarYGenerarQR($documentoValido);
        $qrImageData = ob_get_contents();
        ob_end_clean();

        $this->assertNotEmpty($qrImageData); // Verifica que se generó algún contenido
        $this->assertStringContainsString('Content-Type: image/png', xdebug_get_headers()[0]); // Verifica el tipo de contenido
    }

    public function testVerificarYGenerarQRConDocumentoNoRegistrado()
    {
        // Proporciona un documento que no esté en la base de datos
        $documentoNoValido = '000000000';

        ob_start();
        $this->generarQR->verificarYGenerarQR($documentoNoValido);
        $mensaje = ob_get_contents();
        ob_end_clean();

        $this->assertStringContainsString("no está registrado en la base de datos", $mensaje); // Verifica que se muestra el mensaje correcto
    }

    public function testVerificarYGenerarQRConDocumentoVacio()
    {
        // Probar con un documento vacío
        $documentoVacio = '';

        ob_start();
        $this->generarQR->verificarYGenerarQR($documentoVacio);
        $mensaje = ob_get_contents();
        ob_end_clean();

        $this->assertStringContainsString("Por favor, ingrese un número de documento válido", $mensaje); // Verifica que se muestra el mensaje correcto
    }

    protected function tearDown(): void
    {
        // Aquí puedes realizar limpieza si es necesario
        // Por ejemplo, eliminar entradas en la base de datos de prueba
    }
}
