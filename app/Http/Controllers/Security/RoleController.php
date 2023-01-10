<?php

namespace App\Http\Controllers\Security;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Security\Permission;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Security\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $model = Role::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/security/role", 'name' => "Nível de Acesso"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;

        $roles = $this->model::filtros($request)
            ->where('id', '>', 1)
            ->where('id', '<>', 9)
            ->where('id', '<>', 10)
            ->orderBy('name');

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($roles);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($roles);
        }

        $roles = $roles->withCount('users')->paginate(config('app.paginate'));
        return view('modules/security/role/index', compact('breadcrumbs', 'request', 'roles'));
    }

    public function destroy($id)
    {
        $role = $this->model::find($id);
        // dd([$id, $role]);
        if ($role->users()->count() > 0) {
            session()->flash('error_message', 'Você não pode apagar porque há usuários com este Nivel de Acesso');
            return redirect()->back();
        }

        $role->permissions()->detach();

        $role->delete();

        session()->flash('flash_message', 'Apagado com Sucesso!');
        return redirect('security/role');
    }

    private function indexPdf($roles)
    {
        $roles = $roles->get();
        return \PDF::loadView('modules/security/role/indexPdf', compact('roles'))
            ->setPaper('a4')
            ->download('Nivel-de-Acesso.pdf');
    }

    private function indexExcel($roles)
    {
        $roles = $roles->get();
        $view = 'modules/security/role/indexExcel';
        $arquivo = 'Nivel-de-Acesso.xlsx';
        $dados = ['roles' => $roles];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        if ($id == 9 || $id == 10) {
            $user = Auth::user();
            $user->home = $user->home->url ?? '/';
            return redirect($user->home);
        }
        $breadcrumbs = $this->breadcrumbs;

        $role = $this->model::findOrNew($id);
        $role->perms = $role->permissions()->pluck('id');
        $permissions = Permission::whereNull('permission_id')
            ->orderBy('position')
            ->get();
        return view('modules/security/role/create', compact('breadcrumbs', 'role', 'permissions'));
    }
}
