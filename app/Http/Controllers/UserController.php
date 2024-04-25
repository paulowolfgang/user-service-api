<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->user = $users;
    }

    public function index()
    {
        $users = $this->user->all();
        return response()->json($users);
    }

    public function show($id){
        try{
            $users = $this->user->findOrFail($id);
            return response()->json($users);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível encontrar o usuário informado!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function store(UserRequest $request)
    {
        try {
            $user = $this->user->create($request->all());
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível cadastrar um novo usuário!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function update(UserRequest $request, $id)
    {
        try {
            $user = $this->user->findOrFail($id);

            $validatedData = $request->validated();

            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = $validatedData['password'];
            $user->update();

            return response()->json($user, 200);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível atualizar o usuário informado!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->user->findOrFail($id);
            $user->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível excluir o usuário informado!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
