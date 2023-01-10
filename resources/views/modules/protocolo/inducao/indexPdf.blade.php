@extends('layouts.templatePDF', ['header' => 'Protocolos de indução', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Dias em lactação</th>
                <th>Data Protocolo</th>
                <th>Animal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inducoes as $inducao)
                <tr>
                    <td>
                        {{ $inducao->nome }}
                    </td>
                    <td>
                        {{ $inducao->desc }}
                    </td>
                    <td>
                        {{ $inducao->dias_lactacao }}
                    </td>
                    <td>
                        {{ $inducao->dt_prt }}
                    </td>
                    <td>
                        {{ $inducao->animal->nome }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
