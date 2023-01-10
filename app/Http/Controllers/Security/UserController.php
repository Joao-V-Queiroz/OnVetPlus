<?php

namespace App\Http\Controllers\Security;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Security\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Security\Role;

class UserController extends Controller
{
    protected $model = User::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/security/users", 'name' => "Usuários"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $users = $this->model::filtros($request)
        ->where('id', '>', 1)
        ->orderBy('name');
        
        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($users);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($users);
        }

        $users = $users->with('role:id,name')
        ->paginate(config('app.paginate'));
        
        $resume = $this->model::filtros($request)
            ->select(
                DB::raw('SUM(IF(active = 1, 1 ,0)) as actives'),
                DB::raw('SUM(IF(active = 0, 1 ,0)) as inactives')
            )
            ->where('id', '>', 1)
            ->first()
        ;

        $viewData = compact('breadcrumbs', 'request', 'users', 'resume');
        
        return view('modules/security/user/index', $viewData);
    }

    private function indexPdf($users)
    {
        $users = $users->get();
        return \PDF::loadView('modules/security/user/indexPdf', compact('users'))
            ->setPaper('a4')
            ->download('Usuarios.pdf')
        ;
    }

    private function indexExcel($users)
    {
        $users = $users->get();
        $view = 'modules/security/user/indexExcel';
        $arquivo = 'Usuarios.xlsx';
        $dados = ['users' => $users];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $user = $this->model::findOrFail($id);
            $user->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('security/users');
    }

    public function create($id)
    {
        $permissions = Permission::select('id', 'name')->whereNull('permission_id')->orderBy('name')->get();
        $breadcrumbs = $this->breadcrumbs;
        $roles = Role::select('id', 'name')->orderBy('name')->get();
        $user = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'user', 'permissions', 'roles');
        return view('modules/security/user/create', $dataView);      //
    }
}
