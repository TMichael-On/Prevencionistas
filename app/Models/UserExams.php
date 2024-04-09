<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExams extends Model{
    protected $table = "latam_usuario_examen";
    protected $primaryKey = 'usuario_examen_id';
    public $timestamps = false;

    protected $fillable = [
        'usuario_examen_contador',
        'usuario_id',
        'examen_id',
    ];
}