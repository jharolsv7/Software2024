<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goleadore extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'goleadores';

    protected $fillable = ['partido_id','jugador_id','goles'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jugador()
    {
        return $this->belongsTo(Jugador::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
    
}
