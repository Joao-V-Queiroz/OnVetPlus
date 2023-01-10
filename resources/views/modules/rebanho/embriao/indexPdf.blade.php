@extends('layouts.templatePDF', ['header' => 'Embriões', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipos</th>
                <th>Pai</th>
                <th>Mãe</th>
                <th>Módulo de Congelamento</th>
                <th>Grau de Desenvolvimento</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($embrioes as $embriao)
                <tr>
                    <td>
                        {{ $embriao->nome }}
                    </td>
                    <td>
                        {{ $embriao->tipo }}
                    </td>
                    <td>
                        {{ $embriao->animais->nome }}
                    </td>
                    <td>
                        {{ $embriao->animal->nome }}
                    </td>
                    <td>
                        {{ $embriao->getCongelamentos() }}
                    </td>
                    <td>
                        {{ $embriao->getGraus() }}
                    </td>
                    <td>
                        {{ $embriao->observacao }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
