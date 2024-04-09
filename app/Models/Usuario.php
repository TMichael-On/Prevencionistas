<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Usuario extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = "latam_usuario";
    protected $primaryKey = 'usuario_id';
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'usuario_email'
    ];
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'usuario_clave'
    ];

    public static function getData($usuarios) {

        return $usuarios->map(function ($usuario) {
            $usuario_apellidos_nombres = $usuario->usuario_nombre.' '.$usuario->usuario_apellidos;
            return [
                'Id' => $usuario->usuario_id,
                'Nombres y apellidos' => $usuario_apellidos_nombres,
                'Correo electrónico' => $usuario->usuario_email,
                'Opciones' => $usuario->usuario_id
            ];
        });
    }
}