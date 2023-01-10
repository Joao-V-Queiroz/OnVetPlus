<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Qtd de Usuários</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td class="text-center">{{ $role->users()->count() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>