<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-Mail</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Cargo</th>
            <th>Nível de Acesso</th>
            <th>Página Inicial</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->cellphone }}</td>
            <td>{{ $user->jobtitle }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ isset($user->home->name) ? __('locale.'. $user->home->name) : '' }}</td>
            <td>{!! Helper::getAtivoInativo($user->active, true) !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
