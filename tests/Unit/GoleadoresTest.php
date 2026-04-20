namespace Tests\Unit;

use App\Http\Livewire\Goleadores;
use App\Models\Goleador;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GoleadoresTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testStoreCreatesGoleadorSuccessfully()
    {
        Livewire::test(Goleadores::class)
            ->set('jugador_id', 1)
            ->set('goles', 10)
            ->call('store')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('goleadores', [
            'jugador_id' => 1,
            'goles' => 10,
        ]);
    }

    /** @test */
    public function testStoreFailsWithNegativeGoles()
    {
        Livewire::test(Goleadores::class)
            ->set('jugador_id', 1)
            ->set('goles', -5)
            ->call('store')
            ->assertHasErrors(['goles' => 'min']);
    }

    /** @test */
    public function testUpdateGoleadorSuccessfully()
    {
        $goleador = Goleador::factory()->create();

        Livewire::test(Goleadores::class)
            ->set('selected_id', $goleador->id)
            ->set('goles', 20)
            ->call('update')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('goleadores', [
            'id' => $goleador->id,
            'goles' => 20,
        ]);
    }

    /** @test */
    public function testUpdateFailsWithNegativeGoles()
    {
        $goleador = Goleador::factory()->create();

        Livewire::test(Goleadores::class)
            ->set('selected_id', $goleador->id)
            ->set('goles', -10)
            ->call('update')
            ->assertHasErrors(['goles' => 'min']);
    }

    /** @test */
    public function testDestroyDeletesGoleador()
    {
        $goleador = Goleador::factory()->create();

        Livewire::test(Goleadores::class)
            ->call('destroy', $goleador->id)
            ->assertStatus(200);

        $this->assertDeleted($goleador);
    }

    /** @test */
    public function testDestroyFailsWithInvalidId()
    {
        Livewire::test(Goleadores::class)
            ->call('destroy', 999)
            ->assertStatus(404);
    }
}
