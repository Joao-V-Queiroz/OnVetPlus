<h3>Cancelamento de Assinatura</h3>
<strong>Nome:</strong><br>
{{ $dados['nome'] }} {{ $dados['nome'] }}<br><br>
<strong>CPF:</strong><br>
{{ $dados['cpf'] }}<br><br>
<strong>Email</strong><br>
{{ $dados['email'] }}<br><br>
<strong>Motivo de Cancelamento</strong><br>
{!! nl2br(htmlentities($dados['mensagem'])) !!}<br><br>