<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// use Illuminate\Support\Hash;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);



        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken($request->nameToken)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'E-mail ou senha inválidos.'
            ], 401);
        }

        $token = $user->createToken('UsuarioLogado')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response(['message' => 'Autenticado',$response, 201]);
    }

    public function logout(Request $request)
    {
        // Verifica se o usuário está autenticado
        if (auth()->check()) {
            // Se autenticado, exclui os tokens do usuário
            auth()->user()->tokens()->delete();

            // Retorna uma resposta de sucesso
            return response([
                'message' => 'Deslogado com sucesso'
            ], 200);
        } else {
            // Se não estiver autenticado, retorna uma resposta apropriada
            return response([
                'message' => 'Usuário não autenticado'
            ], 401); // Você pode usar um código de status HTTP diferente, como 401 Não Autorizado
        }
    }

}
