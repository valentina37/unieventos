<?php
use PHPUnit\Framework\TestCase;

require_once 'clases/Eventos.php';

class EventosTest extends TestCase
{
    protected $eventos;

    protected function setUp(): void
    {
        // Instanciar la clase Eventos antes de cada prueba
        $this->eventos = new Eventos();
    }

    public function testMostrarEventosConFecha()
    {
        $id_usuario = 1; // Cambia esto por un ID de usuario válido que tengas en la base de datos
        $fecha = '2024-10-23'; // Cambia esto por una fecha válida

        $resultados = $this->eventos->mostrarEventos($id_usuario, $fecha);
        $this->assertIsArray($resultados, "Debería devolver un array.");
    }

    public function testMostrarEventosSinFecha()
    {
        $id_usuario = 1; // Cambia esto por un ID de usuario válido
        $resultados = $this->eventos->mostrarEventos($id_usuario, "");
        $this->assertIsArray($resultados, "Debería devolver un array.");
    }

    public function testAgregarEvento()
    {
        $data = [
            'id_usuario' => 1, // Cambia esto por un ID de usuario válido
            'evento' => 'Evento de Prueba',
            'lugar' => 'Lugar de Prueba',
            'descripcion' => 'Descripción del evento de prueba',
            'hora_inicio' => '10:00:00',
            'hora_fin' => '12:00:00',
            'fecha' => '2024-10-23'
        ];

        $resultado = $this->eventos->agregar($data);
        $this->assertTrue($resultado, "Debería agregar el evento correctamente.");
    }

    public function testEliminarEvento()
    {
        $id_evento = 1; // Cambia esto por un ID de evento que exista en la base de datos
        $resultado = $this->eventos->eliminarEvento($id_evento);
        $this->assertTrue($resultado, "Debería eliminar el evento correctamente.");
    }

    public function testActualizarEvento()
    {
        $data = [
            'id_usuario' => 1, // Cambia esto por un ID de usuario válido
            'evento' => 'Evento Actualizado',
            'lugar' => 'Lugar Actualizado',
            'descripcion' => 'Descripción actualizada',
            'hora_inicio' => '14:00:00',
            'hora_fin' => '16:00:00',
            'fecha' => '2024-10-24',
            'id_evento' => 1 // Cambia esto por un ID de evento que exista
        ];

        $resultado = $this->eventos->actualizarEvento($data);
        $this->assertTrue($resultado, "Debería actualizar el evento correctamente.");
    }

    public function testMostrarInvitadosEvento()
    {
        $id_evento = 1; // Cambia esto por un ID de evento válido
        $resultados = $this->eventos->mostrarInvitadosEvento($id_evento);
        $this->assertIsArray($resultados, "Debería devolver un array.");
    }

    public function testHayInvitados()
    {
        $id_evento = 1; // Cambia esto por un ID de evento válido
        $resultado = $this->eventos->hayInvitados($id_evento);
        $this->assertIsInt($resultado, "Debería devolver un entero que representa el total de invitados.");
    }
}
?>
