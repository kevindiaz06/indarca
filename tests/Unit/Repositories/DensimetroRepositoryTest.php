<?php

namespace Tests\Unit\Repositories;

use App\Models\Densimetro;
use App\Models\User;
use App\Repositories\DensimetroRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DensimetroRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected DensimetroRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new DensimetroRepository();
    }

    /** @test */
    public function it_can_get_all_densimetros()
    {
        // Crear usuario cliente para los densímetros
        $cliente = User::factory()->create(['role' => 'cliente']);

        // Crear 5 densímetros para el test
        Densimetro::factory()->count(5)->create([
            'cliente_id' => $cliente->id
        ]);

        // Obtener todos los densímetros
        $densimetros = $this->repository->getAll(10);

        // Asegurar que se obtuvieron los 5 densímetros
        $this->assertCount(5, $densimetros);
    }

    /** @test */
    public function it_can_find_densimetro_by_id()
    {
        // Crear usuario cliente para el densímetro
        $cliente = User::factory()->create(['role' => 'cliente']);

        // Crear un densímetro
        $densimetro = Densimetro::factory()->create([
            'cliente_id' => $cliente->id,
            'numero_serie' => 'TEST-001'
        ]);

        // Buscar el densímetro por ID
        $foundDensimetro = $this->repository->findById($densimetro->id);

        // Verificar que se encontró el densímetro correcto
        $this->assertEquals($densimetro->id, $foundDensimetro->id);
        $this->assertEquals('TEST-001', $foundDensimetro->numero_serie);
    }

    /** @test */
    public function it_can_create_a_densimetro()
    {
        // Crear usuario cliente
        $cliente = User::factory()->create(['role' => 'cliente']);

        // Datos para el nuevo densímetro
        $data = [
            'cliente_id' => $cliente->id,
            'numero_serie' => 'NEW-001',
            'marca' => 'Marca Test',
            'modelo' => 'Modelo Test',
            'fecha_entrada' => now()->toDateString(),
            'referencia_reparacion' => 'REF-' . uniqid(),
            'estado' => 'recibido',
        ];

        // Crear el densímetro
        $densimetro = $this->repository->create($data);

        // Verificar que se creó correctamente
        $this->assertDatabaseHas('densimetros', [
            'id' => $densimetro->id,
            'numero_serie' => 'NEW-001',
            'marca' => 'Marca Test',
        ]);
    }

    /** @test */
    public function it_can_update_a_densimetro()
    {
        // Crear usuario cliente
        $cliente = User::factory()->create(['role' => 'cliente']);

        // Crear un densímetro
        $densimetro = Densimetro::factory()->create([
            'cliente_id' => $cliente->id,
            'numero_serie' => 'TEST-002',
            'estado' => 'recibido'
        ]);

        // Datos para actualizar
        $data = [
            'estado' => 'en_reparacion',
            'observaciones' => 'Observación actualizada',
        ];

        // Actualizar el densímetro
        $updatedDensimetro = $this->repository->update($densimetro, $data);

        // Verificar que se actualizó correctamente
        $this->assertEquals('en_reparacion', $updatedDensimetro->estado);
        $this->assertEquals('Observación actualizada', $updatedDensimetro->observaciones);
    }

    /** @test */
    public function it_can_delete_a_densimetro()
    {
        // Crear usuario cliente
        $cliente = User::factory()->create(['role' => 'cliente']);

        // Crear un densímetro
        $densimetro = Densimetro::factory()->create([
            'cliente_id' => $cliente->id,
        ]);

        // Verificar que existe
        $this->assertDatabaseHas('densimetros', ['id' => $densimetro->id]);

        // Eliminar el densímetro
        $this->repository->delete($densimetro);

        // Verificar que se eliminó
        $this->assertDatabaseMissing('densimetros', ['id' => $densimetro->id]);
    }

    /** @test */
    public function it_can_find_densimetro_by_numero_serie()
    {
        // Crear usuario cliente
        $cliente = User::factory()->create(['role' => 'cliente']);

        // Crear un densímetro con número de serie específico
        Densimetro::factory()->create([
            'cliente_id' => $cliente->id,
            'numero_serie' => 'SERIE-UNICA-123'
        ]);

        // Buscar por número de serie
        $foundDensimetro = $this->repository->findByNumeroSerie('SERIE-UNICA-123');

        // Verificar que se encontró el densímetro correcto
        $this->assertNotNull($foundDensimetro);
        $this->assertEquals('SERIE-UNICA-123', $foundDensimetro->numero_serie);
    }

    /** @test */
    public function it_can_check_if_another_densimetro_in_repair_exists()
    {
        // Crear usuario cliente
        $cliente = User::factory()->create(['role' => 'cliente']);

        // Crear un densímetro en reparación (sin fecha_finalizacion)
        $densimetro1 = Densimetro::factory()->create([
            'cliente_id' => $cliente->id,
            'numero_serie' => 'SERIE-123',
            'fecha_finalizacion' => null
        ]);

        // Crear otro densímetro finalizado
        $densimetro2 = Densimetro::factory()->create([
            'cliente_id' => $cliente->id,
            'numero_serie' => 'SERIE-456',
            'fecha_finalizacion' => now()->toDateString()
        ]);

        // Verificar que existe otro con el mismo número de serie en reparación
        $exists = $this->repository->existeOtroEnReparacion('SERIE-123', $densimetro2->id);
        $this->assertTrue($exists);

        // Verificar que no existe otro con número de serie diferente
        $exists = $this->repository->existeOtroEnReparacion('SERIE-789');
        $this->assertFalse($exists);
    }
}
