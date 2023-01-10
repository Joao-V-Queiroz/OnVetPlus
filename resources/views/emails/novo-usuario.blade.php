<html>
    <body>
        <p>Olá {{ $user->name }}!</p>
        <p></p>
        <p>Você foi cadastrado como parceiro no <a href="{{URL::to('/')}}">Rede América Premios</a></p>
        <p></p>
        <p>Sua senha de acesso é {{ $user->senha }}</p>
        <p>Att, <br>
        Rede América!</p>
    </body>
</html>