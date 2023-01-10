@extends('layouts.templatePDF', ['header' => 'Sêmens', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Registro</th>
                <th>Central</th>
                <th>Raça</th>
                <th>Tipo de Sêmen</th>
                <th>Grau de Sangue</th>
                <th>Raça 2</th>
                <th>Pai</th>
                <th>Mãe</th>
                <th>Técnico</th>
                <th>Parida</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semens as $semen)
                <tr>
                    <td>
                        {{ $semen->nome }}
                    </td>
                    <td>
                        {{ $semen->registro }}
                    </td>
                    <td>
                        {{ $semen->central }}
                    </td>
                    <td>
                        {{ $semen->getRaca() }}
                    </td>
                    <td>
                        {{ implode(', ', $semen->tipos ?? []) }}
                    </td>
                    <td>
                        {{ $semen->getSangue() }}
                    </td>
                    <td>
                        {{ $semen->getRaca2() }}
                    </td>
                    <td>
                        {{ $semen->animais->nome }}
                    </td>
                    <td>
                        {{ $semen->animal->nome }}
                    </td>
                    <td>
                        {{ $semen->parida }}
                    </td>
                    <td>
                        {{ $semen->tec }}
                    </td>
                    <td>
                        {{ $semen->observacao }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
