<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            $validator = Validator::make($credentials, [
                'email' => 'required|string',
                'password' => 'required'
            ], [
                'email.required' => 'E-mail é um campo obrigatório.',
                'password.required' => 'Senha é um campo obrigatório.',
            ]);

            if ($validator->fails()) {
                throw new \Exception($validator->errors());
            }

            if (User::whereEmail($request->email)->first()) {
                return response()->json([
                    'error' => true,
                    'response' => [
                        'message' => 'E-mail já cadastrado em nossa base de dados!',
                    ]
                ]);
            }

            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->save();

            return response()->json([
                'error' => false,
                'response' => [
                    'message' => 'Usuário cadastrado com sucesso!',
                ]
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
