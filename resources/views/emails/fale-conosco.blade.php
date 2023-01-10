<h3>Fale Conosco</h3>
<strong>Nome:</strong><br>
{{ $dados['nome'] }}<br><br>
<strong>Email</strong><br>
{{ $dados['email'] }}<br><br>
<strong>Assunto</strong><br>
{{ $dados['assunto'] }}<br><br>
<strong>Mensagem</strong><br>
{!! nl2br(htmlentities($dados['mensagem'])) !!}<br><br>