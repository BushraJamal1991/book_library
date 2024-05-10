<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{


   public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


      /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
  public function login(Request $request)
    {

        $validator = Validator::make($request->all(),[
         'email'=>'required|email',
         'password'=>'required|string|min:8'
        ]);
 if($validator->fails()){
   return response()->json($validator->errors(), 422);


 }
        if (!$token = auth()->attempt($$validator->validated())) {
         return response()->json(['error' => 'Unauthorized'], 401);
        }

            return $this->respondWithToken($token);
        }

    

/**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

public function register(Request $request){

 $validator = Validator::make($request->all(),[
         'name'=>'required|string|between:2,100',
         'email'=>'required|email|string|max:100|unique:users',
         'password'=>'required|string|min:8'
        ]);

        if($validator->fails()){
         return response()->json($validator->errors()->toJson(), 400); }

         $user=User::create(array_merge($validator->validated(),
         ['password'=>bcrypt($request->password)] 
        ));
        return response()->json([
         'message'=>'User successfully registered',
         'user'=>$user
        ],201);

}

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
   
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}

