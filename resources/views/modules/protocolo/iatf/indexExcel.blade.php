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
        @foreach ($iatfs as $iatf)
            <tr>
                <td>
                    {{ $iatf->nome }}
                </td>
                <td>
                    {{ $iatf->desc }}
                </td>
                <td>
                    {{ $iatf->animais->nome }}
                </td>
                <td>
                    {{ $iatf->animal->nome }}
                </td>
        @endforeach
    </tbody>
</table>
