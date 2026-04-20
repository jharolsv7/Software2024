namespace Tests\Unit;

use App\Http\Livewire\Ingresos;
use App\Models\Ingreso;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngresosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testStoreCreatesIngresoSuccessfully()
    {
        Livewire::test(Ingresos::class)
            ->set('detalles', 'Test Detalle')
            ->set('monto', 100.00)
            ->call('store')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('closeModal');

        $this->assertDatabaseHas('ingresos', [
            'detalles' => 'Test Detalle',
            'monto' => 100.00,
        ]);
    }

    /** @test */
    public function testStoreFailsWithNegativeMonto()
    {
        Livewire::test(Ingresos::class)
            ->set('detalles', 'Test Detalle')
            ->set('monto', -50.00)
            ->call('store')
            ->assertHasErrors(['monto' => 'min']);
    }
}
public function testUpdateSuccessfully()
{
    $ingreso = Ingreso::factory()->create();

    Livewire::test(Ingresos::class)
        ->set('selected_id', $ingreso->id)
        ->set('detalles', 'Updated Detalle')
        ->set('monto', 200.00)
        ->call('update')
        ->assertHasNoErrors()
        ->assertDispatchedBrowserEvent('closeModal');

    $this->assertDatabaseHas('ingresos', [
        'id' => $ingreso->id,
        'detalles' => 'Updated Detalle',
        'monto' => 200.00,
    ]);
}

public function testUpdateFailsWithNegativeMonto()
{
    $ingreso = Ingreso::factory()->create();

    Livewire::test(Ingresos::class)
        ->set('selected_id', $ingreso->id)
        ->set('detalles', 'Updated Detalle')
        ->set('monto', -200.00)
        ->call('update')
        ->assertHasErrors(['monto' => 'min']);
}
public function testDestroyDeletesIngreso()
{
    $ingreso = Ingreso::factory()->create();

    Livewire::test(Ingresos::class)
        ->call('destroy', $ingreso->id)
        ->assertStatus(200);

    $this->assertDeleted($ingreso);
}

public function testDestroyFailsWithInvalidId()
{
    Livewire::test(Ingresos::class)
        ->call('destroy', 999)
        ->assertStatus(404);
}
