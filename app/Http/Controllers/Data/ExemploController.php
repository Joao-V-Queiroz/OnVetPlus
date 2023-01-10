<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Exception;
use Auth;

class ExemploController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('role:id,name');
        return datatables()->of($users)->make(true);
    }

    public function show($id)
    {
        $user = User::with('role:id,name')->findOrFail($id);
        return $user;
    }

    public function save(Request $request)
    {
        try {

            $user = User::findOrFail($request->id);
            $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->email = $request->email;
            if (isset($request->password) && $request->password != "") {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return [ 'success' => true, 'message' => 'Usuário Salvo com Sucesso! '];
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'message' => "Erro ao SALVAR o Usuário.",
                'error' => $e->getMessage()
            ];
            return response($data, 400);
        }
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        try {
            $user->delete();
            return ['success' => true, 'message' => 'Usuário APAGADO com Sucesso!'];
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'message' => "Erro ao APAGAR o Usuário.",
                'error' => $e->getMessage()
            ];
            return response($data, 400);
        }

    }
}
