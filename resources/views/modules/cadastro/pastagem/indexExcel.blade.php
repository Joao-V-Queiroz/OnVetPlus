<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data Início</th>
            <th>Data Fim</th>
            <th>Área</th>
            <th>Tipo</th>
            <th>Custo</th>
            <th>Total</th>
            <th>Observação</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pastagens as $pastagem)
            <tr>
                <td>
                    {{ $pastagem->nome }}
                </td>
                <td>
                    {{ $pastagem->dt_ini }}
                </td>
                <td>
                    {{ $pastagem->dt_fim }}
                </td>
                <td>
                    {{ $pastagem->area }}
                </td>
                <td>
                    {{ $pastagem->getTipo() }}
                </td>
                <td>
                    {{ $pastagem->custo }}
                </td>
                <td>
                    {{ $pastagem->total }}
                </td>
                <td>
                    {{ $pastagem->pastagem }}
                </td>
                <td>
                    {!! Helper::getAtivoInativo($pastagem->ativo, true) !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
