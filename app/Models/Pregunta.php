<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model{
    protected $table = "latam_pregunta";
    protected $primaryKey = 'pregunta_id';
    public $timestamps = false;

    public function examen()
    {
        return $this->belongsTo(Examen::class, 'examen_id');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'pregunta_id');
    }
}