@extends('layouts.templatePDF', ['header' => 'Tanques', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Capacidade (L)</th>
                <th>Observação</th>
                <th style="width: 5%;">Status</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($tanques as $tanque)
                <tr>
                    <td>
                        {{ $tanque->nome }}
                    </td>
                    <td>
                        {{ $tanque->litros }}
                    </td>
                    <td>
                        {{ $tanque->observacao }}
                    </td>
                    <td>{!! Helper::getAtivoInativo($tanque->ativo, true) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
