<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'equipos';

    protected $fillable = ['nombre','logo','eslogan','nombreMadrina','inscripcionMonto','puntos','grupo','goles_a_favor','goles_en_contra'];
	
}
