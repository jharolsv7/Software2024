<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sancion';

    protected $fillable = ['tipo','monto','fecha','jugador_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jugador()
    {
        return $this->hasOne('App\Models\Jugador', 'id', 'jugador_id');
    }
    
}
