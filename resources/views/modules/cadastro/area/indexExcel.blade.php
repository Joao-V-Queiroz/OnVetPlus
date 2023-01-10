<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data Início</th>
            <th>Data Fim</th>
            <th>Área</th>
            <th>Tipo</th>
            <th>Vida útil</th>
            <th>Observação</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
