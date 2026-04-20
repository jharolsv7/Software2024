namespace Tests\Unit;

use App\Http\Livewire\Egresos;
use App\Models\Egreso;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EgresosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testStoreCreatesEgresoSuccessfully()
    {
        Livewire::test(Egresos::class)
            ->set('detalles', 'Test Detalle')
            ->set('monto', 100.00)
            ->call('store')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('egresos', [
            'detalles' => 'Test Detalle',
            'monto' => 100.00,
        ]);
    }

    /** @test */
    public function testStoreFailsWithNegativeMonto()
    {
        Livewire::test(Egresos::class)
            ->set('detalles', 'Test Detalle')
            ->set('monto', -50.00)
            ->call('store')
            ->assertHasErrors(['monto' => 'min']);
    }
}
public function testUpdateSuccessfully()
{
    $egreso = Engreso::factory()->create();

    Livewire::test(Egresos::class)
        ->set('selected_id', $egreso->id)
        ->set('detalles', 'Updated Detalle')
        ->set('monto', 200.00)
        ->call('update')
        ->assertHasNoErrors()
        ->assertDispatchedBrowserEvent('closeModal');

    $this->assertDatabaseHas('egresos', [
        'id' => $ingreso->id,
        'detalles' => 'Updated Detalle',
        'monto' => 200.00,
    ]);
}

public function testUpdateFailsWithNegativeMonto()
{
    $egreso = Egreso::factory()->create();

    Livewire::test(Egresos::class)
        ->set('selected_id', $egreso->id)
        ->set('detalles', 'Updated Detalle')
        ->set('monto', -200.00)
        ->call('update')
        ->assertHasErrors(['monto' => 'min']);
}
public function testDestroyDeletesEgreso()
{
    $egreso = Egreso::factory()->create();

    Livewire::test(Egresos::class)
        ->call('destroy', $Egreso->id)
        ->assertStatus(200);

    $this->assertDeleted($Egreso);
}

public function testDestroyFailsWithInvalidId()
{
    Livewire::test(Egresos::class)
        ->call('destroy', 999)
        ->assertStatus(404);
}
