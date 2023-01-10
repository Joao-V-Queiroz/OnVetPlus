@extends('layouts.templatePDF', ['header' => 'Nível de Acesso', 'title' => ''])
@section('content')  

<table class="table-linhas">
    <thead>
        <tr>
            <th>Nome</th>
            <th style="width: 5%;" nowrap>Qtd de Usuários</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td class="text-center">{{ $role->users()->count() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection