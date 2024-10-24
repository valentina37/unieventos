<?php
use PHPUnit\Framework\TestCase;
require_once 'clases/Invitados.php';

class InvitadosTest extends TestCase
{
    protected $invitado;

    protected function setUp(): void
    {
        $this->invitado = new Invitado();
    }

    public function testMostrarInvitados()
    {
        // Proporciona un id_usuario que tenga invitados en la base de datos
        $id_usuario = 1; // Cambia esto a un id_usuario válido

        $invitados = $this->invitado->mostrarInvitados($id_usuario);

        $this->assertIsArray($invitados);
        $this->assertNotEmpty($invitados); // Verifica que se devuelvan algunos invitados
    }

    public function testAgregarInvitadoConDocumentoExistente()
    {
        // Proporciona un documento que ya existe en la base de datos
        $data = [
            'id_evento' => 1, // Cambia esto al id_evento válido
            'nombre_invitado' => 'Juan Pérez',
            'documento' => '123456789', // Cambia esto al documento existente
            'email' => 'juan@example.com'
        ];

        $resultado = $this->invitado->agregarInvitado($data);

        $this->assertEquals(0, $resultado); // Verifica que el resultado es 0 para "Registro existente"
    }

    public function testAgregarInvitado()
    {
        // Proporciona un documento que no existe en la base de datos
        $data = [
            'id_evento' => 1, // Cambia esto al id_evento válido
            'nombre_invitado' => 'Maria Gómez',
            'documento' => '987654321', // Cambia esto a un nuevo documento
            'email' => 'maria@example.com'
        ];

        $resultado = $this->invitado->agregarInvitado($data);

        $this->assertEquals(1, $resultado); // Verifica que el resultado es 1 para "agregado"
    }

    public function testEliminarInvitado()
    {
        // Proporciona un id_invitado que existe en la base de datos
        $id_invitado = 1; // Cambia esto al id_invitado válido

        $resultado = $this->invitado->eliminarInvitado($id_invitado);

        $this->assertTrue($resultado); // Verifica que se eliminó correctamente
    }

    public function testActualizarInvitado()
    {
        // Proporciona un id_invitado que existe en la base de datos
        $data = [
            'id_evento' => 1, // Cambia esto al id_evento válido
            'nombre_invitado' => 'Juan Pérez Actualizado',
            'documento' => '123456789', // Documento existente
            'email' => 'juan_actualizado@example.com',
            'id_invitado' => 1 // Cambia esto al id_invitado válido
        ];

        $resultado = $this->invitado->actualizarInvitado($data);

        $this->assertTrue($resultado); // Verifica que se actualizó correctamente
    }
}
