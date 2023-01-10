@extends('layouts.templatePDF', ['header' => 'Áreas', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Área</th>
                <th>Tipo</th>
                <th>Vida útil</th>
                <th>Observação</th>
                <th style="width: 5%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $area)
                <tr>
                    <td>
                        {{ $area->nome }}
                    </td>
                    <td>
                        {{ $area->dt_ini }}
                    </td>
                    <td>
                        {{ $area->dt_fim }}
                    </td>
                    <td>
                        {{ $area->ha }}
                    </td>
                    <td>
                        {{ $area->getTipo() }}
                    </td>
                    <td>
                        {{ $area->util }}
                    </td>
                    <td>
                        {{ $area->observacao }}
                    </td>
                    <td>{!! Helper::getAtivoInativo($area->ativo, true) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
