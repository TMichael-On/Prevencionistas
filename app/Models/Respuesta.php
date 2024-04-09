<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model{
    protected $table = "latam_respuesta";
    protected $primaryKey = 'respuesta_id';
    public $timestamps = false;

    protected $hidden = [
        'respuesta_correcta'
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
}