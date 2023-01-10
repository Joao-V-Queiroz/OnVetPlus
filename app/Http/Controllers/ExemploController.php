<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Security\Role;

class ExemploController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
            ['link' => "javascript:void(0)", 'name' => "Exemplo"],
            ['name' => "CRUD"]
        ];

        $data = new \stdClass();
        
        $data->fields = collect([
            ['id' => 'id', 'name' => '#'],
            ['id' => 'name', 'name' => 'Nome'],
            ['id' => 'email', 'name' => 'E-mail'],
            ['id' => 'created_at', 'name' => 'Criado em'],
            ['id' => 'updated_at', 'name' => 'Alterado em']
        ]);

        $data->datatable = [
            'element' => 'UserData',
            'title' => 'Listagem de Usuários',
            'endpoint' => 'data/exemplo',
            'endpointDelete' => 'data/exemplo/delete',
            'urlShow' => 'exemplo/details',
            'fields' => $data->fields->pluck('id'),
            'tableFields' => $data->fields,
            'columnDefs' => [],
            // array com a numeração das colunas que serão exportadas.
            // Lembrando que a coluna 1 não é setada e nem exibida na Tabela
            'exportColumns' => '1,2,3'
        ];

        $data->statistics = [
            'title' => 'Titulo da Estatistica',
            'items' => [
                ['icone' => 'users', 'nome' => 'Usuarios', 'valor' => 10],
                ['icone' => 'check-square', 'nome' => 'Ativos', 'valor' => 7],
                ['icone' => 'x-square', 'nome' => 'Inativos', 'valor' => 3]
            ]
        ];


        $data->roles = Role::orderBy('name')->get();


        return view('/modules/exemplo/index', compact('data', 'breadcrumbs'));
    }

    public function show($id)
    {
        $pageConfigs = ['pageHeader' => false];
        
        $data = new \stdClass();
        $data->user = User::findOrFail($id);

        $data->fields = collect([
            ['id' => 'id', 'name' => '#'],
            ['id' => 'event', 'name' => 'Tipo'],
            ['id' => 'auditable_type', 'name' => 'Tabela'],
            ['id' => 'old_values', 'name' => 'Dados Anteriores'],
            ['id' => 'new_values', 'name' => 'Dados Atualizados'],
            ['id' => 'created_at', 'name' => 'Data / Hora']
        ]);
        $data->datatable = [
            'element' => 'UserData',
            'title' => 'Logs de Operação no Sistema',
            'endpoint' => "data/security/user/{$data->user->id}/audits",
            'fields' => $data->fields->pluck('id'),
            'tableFields' => $data->fields,
            'columnDefs' => [],
            // array com a numeração das colunas que serão exportadas.
            // Lembrando que a coluna 1 não é setada e nem exibida na Tabela
            'exportColumns' => '1,2,3,4,5,6'
        ];

        $data->columnDefs = [];

        $data->deleteComponent = [
            'id' => $data->user->id,
            'element' => 'deleteUser',
            'endpoint' => 'data/exemplo/delete',
            'url' => 'exemplo'
        ];

        $data->roles = Role::orderBy('name')->get();

        return view('/modules/exemplo/detail', compact('pageConfigs', 'data'));
    }
}
