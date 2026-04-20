namespace Tests\Unit;

use Tests\TestCase;

class SqlInjectionTest extends TestCase
{
    public function test_sql_injection_in_login()
    {
        $response = $this->post('/login', [
            'email' => "' OR '1'='1",
            'password' => "' OR '1'='1",
        ]);

        $response->assertStatus(422); // Asegúrate de que no se permita el acceso
        $this->assertGuest();
    }
}
