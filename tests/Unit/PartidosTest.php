namespace Tests\Unit;

use App\Http\Livewire\Partidos;
use App\Models\Partido;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PartidosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testStoreCreatesPartidoSuccessfully()
    {
        Livewire::test(Partidos::class)
            ->set('equipo_local', 'Equipo A')
            ->set('equipo_visitante', 'Equipo B')
            ->set('fecha', '2024-08-22')
            ->call('store')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('partidos', [
            'equipo_local' => 'Equipo A',
            'equipo_visitante' => 'Equipo B',
            'fecha' => '2024-08-22',
        ]);
    }

    /** @test */
    public function testUpdatePartidoSuccessfully()
    {
        $partido = Partido::factory()->create();

        Livewire::test(Partidos::class)
            ->set('selected_id', $partido->id)
            ->set('equipo_local', 'Equipo C')
            ->set('equipo_visitante', 'Equipo D')
            ->set('fecha', '2024-09-15')
            ->call('update')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('partidos', [
            'id' => $partido->id,
            'equipo_local' => 'Equipo C',
            'equipo_visitante' => 'Equipo D',
            'fecha' => '2024-09-15',
        ]);
    }

    /** @test */
    public function testDestroyDeletesPartido()
    {
        $partido = Partido::factory()->create();

        Livewire::test(Partidos::class)
            ->call('destroy', $partido->id)
            ->assertStatus(200);

        $this->assertDeleted($partido);
    }

    /** @test */
    public function testDestroyFailsWithInvalidId()
    {
        Livewire::test(Partidos::class)
            ->call('destroy', 999)
            ->assertStatus(404);
    }
}
