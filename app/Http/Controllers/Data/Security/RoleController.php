<?php

namespace App\Http\Controllers\Data\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Security\Role;
use Illuminate\Support\Facades\Validator;

use Exception;

class RoleController extends Controller
{
    protected $model = Role::class;
    public function save(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',                     
        ]);

        if ($validate->fails()) {
            return response()->json($validate->messages(), 400);
        }
        try {
            $role = $this->model::findOrNew($request->id);
            $role->name = $request->name;
            $role->save();
            
            $role->permissions()->sync($request->permissions);
            return $role;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Nível de Acesso!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
