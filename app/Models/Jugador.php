<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'jugador';

    protected $fillable = ['nombre','numero','equipo_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function sanciones()
    {
        return $this->hasMany(Sancionjugador::class);
    }
    
}
