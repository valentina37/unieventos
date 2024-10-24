<?php
use PHPUnit\Framework\TestCase;
require_once 'clases/MetodosUtiles.php';

class MetodosUtilesTest extends TestCase
{
    protected $metodosUtiles;

    protected function setUp(): void
    {
        $this->metodosUtiles = new MetodosUtiles();
    }

    public function testFileGetContentsCurl()
    {
        // URL válida para probar
        $url = "https://jsonplaceholder.typicode.com/posts/1"; // URL de ejemplo

        // Realiza la llamada a la función
        $response = $this->metodosUtiles->file_get_contents_curl($url);

        // Verifica que la respuesta no esté vacía
        $this->assertNotEmpty($response);

        // Opcional: Verifica que la respuesta sea un JSON válido
        $json = json_decode($response);
        $this->assertIsObject($json); // Comprueba que sea un objeto
    }

    public function testFileGetContentsCurlInvalidUrl()
    {
        // URL inválida para probar
        $url = "http://invalid-url.test";

        // Realiza la llamada a la función
        $response = $this->metodosUtiles->file_get_contents_curl($url);

        // Verifica que la respuesta esté vacía
        $this->assertEmpty($response);
    }
}
