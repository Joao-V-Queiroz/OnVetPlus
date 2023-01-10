@extends('layouts.templatePDF', ['header' => 'Lotes', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Abreviação</th>
                <th>Sexo</th>
                <th>Fase</th>
                <th>Observação</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lotes as $lote)
                <tr>
                    <td>
                        {{ $lote->nome }}
                    </td>
                    <td>
                        {{ $lote->desc }}
                    </td>
                    <td>
                        {{ $lote->abv }}
                    </td>
                    <td>
                        {{ $lote->getSexo() }}
                    </td>
                    <td>
                        {{ $lote->getFase() }}
                    </td>
                    <td>
                        {{ $lote->observacao }}
                    </td>
                    <td>
                        {!! Helper::getAtivoInativo($lote->ativo, true) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
