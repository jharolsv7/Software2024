namespace Tests\Unit;

use App\Http\Livewire\Sanciones;
use App\Models\Sancion;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SancionesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testStoreCreatesSancionSuccessfully()
    {
        Livewire::test(Sanciones::class)
            ->set('jugador_id', 1)
            ->set('motivo', 'Falta grave')
            ->set('duracion', 3)
            ->call('store')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('sanciones', [
            'jugador_id' => 1,
            'motivo' => 'Falta grave',
            'duracion' => 3,
        ]);
    }

    /** @test */
    public function testUpdateSancionSuccessfully()
    {
        $sancion = Sancion::factory()->create();

        Livewire::test(Sanciones::class)
            ->set('selected_id', $sancion->id)
            ->set('motivo', 'Conducta antideportiva')
            ->set('duracion', 5)
            ->call('update')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('sanciones', [
            'id' => $sancion->id,
            'motivo' => 'Conducta antideportiva',
            'duracion' => 5,
        ]);
    }

    /** @test */
    public function testDestroyDeletesSancion()
    {
        $sancion = Sancion::factory()->create();

        Livewire::test(Sanciones::class)
            ->call('destroy', $sancion->id)
            ->assertStatus(200);

        $this->assertDeleted($sancion);
    }

    /** @test */
    public function testDestroyFailsWithInvalidId()
    {
        Livewire::test(Sanciones::class)
            ->call('destroy', 999)
            ->assertStatus(404);
    }
}
