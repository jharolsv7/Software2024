namespace Tests\Unit;

use App\Http\Livewire\Jugadores;
use App\Models\Jugador;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JugadoresTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testStoreCreatesJugadorSuccessfully()
    {
        Livewire::test(Jugadores::class)
            ->set('nombre', 'Juan Pérez')
            ->set('equipo_id', 1)
            ->call('store')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('jugadores', [
            'nombre' => 'Juan Pérez',
            'equipo_id' => 1,
        ]);
    }

    /** @test */
    public function testUpdateJugadorSuccessfully()
    {
        $jugador = Jugador::factory()->create();

        Livewire::test(Jugadores::class)
            ->set('selected_id', $jugador->id)
            ->set('nombre', 'Carlos López')
            ->set('equipo_id', 2)
            ->call('update')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('jugadores', [
            'id' => $jugador->id,
            'nombre' => 'Carlos López',
            'equipo_id' => 2,
        ]);
    }

    /** @test */
    public function testDestroyDeletesJugador()
    {
        $jugador = Jugador::factory()->create();

        Livewire::test(Jugadores::class)
            ->call('destroy', $jugador->id)
            ->assertStatus(200);

        $this->assertDeleted($jugador);
    }

    /** @test */
    public function testDestroyFailsWithInvalidId()
    {
        Livewire::test(Jugadores::class)
            ->call('destroy', 999)
            ->assertStatus(404);
    }
}
