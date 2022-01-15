<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validate->fails())
        {
            return response()->json([
                'status_code' => 400,
                'message' => 'Bad Request'
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response([
            'status_code' => 200,
            'message' => 'User registered successfully',
        ]);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validate->fails())
        {
            return response()->json([
                'status_code' => 400,
                'message' => 'Bad Request'
            ]);
        }
    
        $credentials = $request->only('email', 'password');


        if(!Auth::attempt($credentials)) {
            return response()->json([
                'status_code' => 500,
                'email' => 'Invalid login details'
            ]);
        }

        $user = User::where('email',$request->email)->first();
        
        return response()->json([
            'status_code' => 200,
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete(); 

        return response()->json([
            'status_code' => 200,
            'message' => 'Token deleted successfully'
        ]);

    }
}
