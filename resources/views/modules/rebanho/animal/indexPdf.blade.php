@extends('layouts.templatePDF', ['header' => 'Animais', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Sangue</th>
                <th>Raça</th>
                <th>Brinco</th>
                <th>Origem</th>
                <th>Data de Nascimento</th>
                <th>Peso</th>
                <th>Nome de Registro</th>
                <th>Número de Registro</th>
                <th>Raça 2</th>
                <th>Pelagem</th>
                <th>Lote</th>
                <th style="width: 5%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animais as $animal)
                <tr>
                    <td>
                        @if (isset($animal->imagem))
                            <img src="{{ asset($animal->imagem) }}" height="42" width="42" />
                        @endif
                    </td>
                    <td>
                        {{ $animal->nome }}
                    </td>
                    <td>
                        {{ $animal->getSexo() }}
                    </td>
                    <td>
                        {{ $animal->sangue }}
                    </td>
                    <td>
                        {{ $animal->getRaca() }}
                    </td>
                    <td>
                        {{ $animal->brinco }}
                    </td>
                    <td>
                        {{ $animal->getOrigem() }}
                    </td>
                    <td>
                        {{ $animal->dt_nasc }}
                    </td>
                    <td>
                        {{ $animal->peso }}
                    </td>
                    <td>
                        {{ $animal->nome_reg }}
                    </td>
                    <td>
                        {{ $animal->num_reg }}
                    </td>
                    <td>
                        {{ $animal->getRaca2() }}
                    </td>
                    <td>
                        {{ $animal->pelagem }}
                    </td>
                    <td>
                        {{ $animal->lote->nome ?? null }}
                    </td>
                    <td>
                    {!! Helper::getAtivoInativo($animal->ativo, true) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <h3>Origem Compra</h3>
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Data de entrada</th>
                <th>Peso de entrada</th>
                <th>Categoria Macho</th>
                <th>Categoria Fêmea</th>
                <th>Fornecedor</th>
                <th>Valor</th>
                <th style="width: 5%;">Desmame</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animais as $animal)
                <tr>
                    <td>
                        {{ $animal->dt_entrada }}
                    </td>
                    <td>
                        {{ $animal->peso_entrada }}
                    </td>
                    <td>
                        {{ $animal->cat_macho }}
                    </td>
                    <td>
                        {{ $animal->cat_femea }}
                    </td>
                    <td>
                        {{ $animal->fornecedor->nome ?? null }}
                    </td>
                    <td>
                        {{ $animal->valor }}
                    </td>
                    <td>{!! Helper::getMameDesmame($animal->desmame, true) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <h3>Crias</h3>
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Número de crias</th>
                <th>Parida ?</th>
                <th>último Parto</th>
                <th>Registro Parto</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Raça</th>
                <th>Brinco</th>
                <th>Nova cria ?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animais as $animal)
                <tr>
                    <td>
                        {{ $animal->num_cria }}
                    </td>
                    <td>
                        {{ $animal->parida }}
                    </td>
                    <td>
                        {{ $animal->dt_parto }}
                    </td>
                    <td>
                        {{ $animal->reg_parto }}
                    </td>
                    <td>
                        {{ $animal->nome_cria }}
                    </td>
                    <td>
                        {{ $animal->sexo_cria }}
                    </td>
                    <td>
                        {{ $animal->raca_cria }}
                    </td>
                    <td>
                        {{ $animal->brinco_cria }}
                    </td>
                    <td>
                        {{ $animal->new_cria }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
