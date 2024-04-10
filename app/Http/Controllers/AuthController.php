<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Firebase\JWT\JWT;

class AuthController extends Controller{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function jwt(Usuario $usuario) 
    {
        $payload = [
            'iss' => "api-jwt",
            'sub' => $usuario->usuario_id,
            'iat' => time(),
            'exp' => time() + 120 * 60
        ];
        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }

    public function login(Usuario $usuario) 
    {
        $this->validate($this->request,[
            'usuario_cuenta' => 'required|email',
            'usuario_clave' =>'required'
        ]);

        $usuario = Usuario::where('usuario_cuenta', $this->request->input('usuario_cuenta'))->first();
        if(!$usuario){
            return response()->json([
                'error' => 'El correo no existe'
            ], 400);            
        }
        $hashMD5_clave = md5($this->request->input('usuario_clave'));
        if ($hashMD5_clave == $usuario->usuario_clave){
            return response()->json([
                'token' => $this->jwt($usuario),
                'usuario_id' => $usuario->usuario_id
            ], 200);   
        }
        
        return response()->json([
            'error' => 'La contraseña es incorrecta'
        ], 400);
    }

    public function view(){        
        return view('login');
    }
}