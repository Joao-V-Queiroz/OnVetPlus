<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Capacidade (L)</th>
            <th>Observação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tanques as $tanque)
            <tr>
                <td>
                    {{ $tanque->nome }}
                </td>
                <td>
                    {{ $tanque->litros }}
                </td>
                <td>
                    {{ $tanque->observacao }}
                </td>
        @endforeach
    </tbody>
</table>
