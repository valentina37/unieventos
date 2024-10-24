<?php
use PHPUnit\Framework\TestCase;

require_once 'clases/Certificado.php';

class CertificadoTest extends TestCase
{
    protected function setUp(): void
    {
        // Configuración inicial, como la conexión a la base de datos
        $this->certificado = new Certificado();
    }

    public function testGenerarCertificadoConDocumentoValido()
    {
        $documento = '123456789'; // Reemplaza con un documento válido existente en la base de datos
        
        // Iniciar buffer de salida
        ob_start();
        $this->certificado->generarCertificado($documento);
        $output = ob_get_clean(); // Obtener el contenido del buffer y limpiar el buffer

        $this->assertStringContainsString('Certificado de Asistencia', $output); // Verificar que el output contenga el texto esperado
    }

    public function testGenerarCertificadoConDocumentoInvalido()
    {
        $documento = '000000000'; // Documento que no existe en la base de datos

        // Iniciar buffer de salida
        ob_start();
        $this->certificado->generarCertificado($documento);
        $output = ob_get_clean(); // Obtener el contenido del buffer y limpiar el buffer

        $this->assertStringContainsString('No se encontró el documento ingresado en la base de datos.', $output); // Verificar que el output contenga el texto esperado
    }

    public function testGenerarCertificadoConDocumentoVacio()
    {
        $documento = ''; // Documento vacío

        // Iniciar buffer de salida
        ob_start();
        $this->certificado->generarCertificado($documento);
        $output = ob_get_clean(); // Obtener el contenido del buffer y limpiar el buffer

        $this->assertStringContainsString('Por favor ingrese un número de documento válido.', $output); // Verificar que el output contenga el texto esperado
    }
}
?>
