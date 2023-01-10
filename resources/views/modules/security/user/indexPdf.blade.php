@extends('layouts.templatePDF', ['header' => 'Usuários', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Cargo</th>
                <th>Nível de Acesso</th>
                <th style="width: 5%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        @if (isset($user->imagem))
                            <img src="{{ asset($user->imagem) }}" height="42" width="42" />
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->cellphone }}</td>
                    <td>{{ $user->jobtitle }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{!! Helper::getAtivoInativo($user->active, true) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
