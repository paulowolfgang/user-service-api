<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['token' => $token]);
        } else {
            return response()->json([
                'info' => 'error',
                'result' => 'Unauthorized!',
                'error' => 'Credenciais inválidas.',
            ], 401);
        }
    }

    public function logout()
    {
        if (auth()->user()) {

            auth()->user()->tokens()->delete();

            return response()->json([
                'info' => 'success',
                'result' => 'Unauthorized!',
                'error' => 'Usuário deslogado com sucesso.',
            ]);
        } else {
            return response()->json([
                'info' => 'error',
                'result' => 'Unauthorized!',
                'error' => 'Não há usuário autenticado.',
            ], 401);
        }
    }
}
