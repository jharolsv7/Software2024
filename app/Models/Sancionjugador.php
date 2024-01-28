<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancionjugador extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sancionjugador';

    protected $fillable = ['jugador_id','detalles','fecha','monto','estado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jugador()
    {
        return $this->belongsTo(Jugador::class);
    }
    
}
