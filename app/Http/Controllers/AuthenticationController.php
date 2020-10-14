<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        $authUser = auth()->guard('api')->user();
        $proyectos = $authUser->proyectos;

        foreach ($proyectos as $proyecto) {
            $proyecto['localidad'] = $proyecto->localidad;
            $proyecto['actualizaciones'] = $proyecto->actualizaciones;
            $proyecto['archivos'] = $proyecto->archivos;
            $proyecto['referentes'] = $proyecto->referentes;
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60,
            'usuario' => [
                'id' => $authUser->id,
                'nombre' => $authUser->name,
                'apellido' => $authUser->last_name,
                'numero' => $authUser->number,
                'email' => $authUser->email,
                'avatar' => $authUser->avatar,
                'created_at' => $authUser->created_at,
                'updated_at' => $authUser->updated_at,
                'proyectos' => $proyectos,
                'billetera' => $authUser->billetera,
            ],
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
     public function me()
    {
        return response()->json(auth()->guard('api')->user());
    }

    public function payload()
    {
        return response()->json(auth()->guard('api')->payload());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->guard('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->guard('api')->refresh());
    }
    // public function login(Request $req){
    //     $credentials = $req->only('email','password');
    //     try {
    //         if(!$token = $this->guard()->attempt($credentials)){
    //             return response()->json(
    //                 ['error' => 'invalid credentials'],
    //                 401
    //             );
    //         }
    //     } catch(JWTException $e) {
    //         return response()->json(
    //             ['error' => 'could not create token'],
    //             500);
    //     }
    //     return response()->json($token);
    //     $response['token'] =$this->respondWithToken($token);
    //     $response['user'] = $this->guard()->user();
    //     return $response;
    // }

}
