<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>CPF</th>
            <th>Função</th>
            <th>Telefone</th>
            <th>Bairro</th>
            <th>Cidade / UF</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($funcionarios as $funcionario)
        <tr>
            <td>
                {{ $funcionario->nome }}
            </td>
            <td>
                {{ $funcionario->getSexo() }}
            </td>
            <td>
                {{ $funcionario->cpf }}
            </td>
            <td>
                {{ $funcionario->funcao }}
            </td>
            <td>
                {{ $funcionario->telefone }}
            </td>
            <td>
                {{ $funcionario->bairro }}
            </td>
            <td>
                {{ $funcionario->cidade }} - {{ $funcionario->uf }}
            </td>
            <td>
                {!! Helper::getAtivoInativo($funcionario->ativo, true) !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>