@extends('layouts.templatePDF', ['header' => 'Fornecedores', 'title' => ''])
@section('content')

<table class="table-linhas">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>CPF</th>
            <th>CNPJ</th>
            <th>Razão Social</th>
            <th>E-mail</th>
            <th>Bairro</th>
            <th>Cidade / UF</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fornecedores as $fornecedor)
        <tr>
            <td>
                {{ $fornecedor->nome }}
            </td>
            <td>
                {{ $fornecedor->getTipo() }}
            </td>
            <td>
                {{ $fornecedor->cpf }}
            </td>
            <td>
                {{ $fornecedor->cnpj }}
            </td>
            <td>
                {{ $fornecedor->razao }}
            </td>
            <td>
                {{ $fornecedor->telefone }}
            </td>
            <td>
                {{ $fornecedor->bairro }}
            </td>
            <td>
                {{ $fornecedor->cidade }} - {{ $fornecedor->uf }}
            </td>
            <td>
                {!! Helper::getAtivoInativo($fornecedor->ativo, true) !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection