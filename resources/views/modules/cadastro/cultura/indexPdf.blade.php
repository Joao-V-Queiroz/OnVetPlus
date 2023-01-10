@extends('layouts.templatePDF', ['header' => 'Culturas', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Área</th>
                <th>Tipo</th>
                <th>Custo de Formação(R$/ha)</th>
                <th>Custo de Formação Total</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($culturas as $cultura)
                <tr>
                    <td>
                        {{ $cultura->nome }}
                    </td>
                    <td>
                        {{ $cultura->dt_ini }}
                    </td>
                    <td>
                        {{ $cultura->dt_fim }}
                    </td>
                    <td>
                        {{ $cultura->ha }}
                    </td>
                    <td>
                        {{ $cultura->getTipo() }}
                    </td>
                    <td>
                        {{ $cultura->custo }}
                    </td>
                    <td>
                        {{ $cultura->total }}
                    </td>
                    <td>
                        {{ $cultura->observacao }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
