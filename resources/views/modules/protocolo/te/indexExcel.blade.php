<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Pai</th>
            <th>Mãe</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tes as $te)
            <tr>
                <td>
                    {{ $te->nome }}
                </td>
                <td>
                    {{ $te->desc }}
                </td>
                <td>
                    {{ $te->animais->nome }}
                </td>
                <td>
                    {{ $te->animal->nome }}
                </td>
        @endforeach
    </tbody>
</table>
