<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Models\UserExams;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;

class KeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->header('Key-Examen')) {
            return response()->json([
                'error' =>'Usted no cuenta con los permisos necesarios'
            ],401);
        }

        $token = $request->header('Key-Examen');

        try {
            $credentials = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
        } catch (ExpiredException $e) {
            return response()->json([
                'error' => 'El tiempo asignado para este examen ha finalizado. Por favor comunícate con el administrador.'
            ], 400);        
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Algo salio mal']
            , 400);        
        }
        $userExams = UserExams::find($credentials->sub);

        $request->auth = $userExams;

        return $next($request);
    }
}
