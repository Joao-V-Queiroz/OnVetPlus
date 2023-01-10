<html>
    <body>
        <p>Olá {{ $user->name }}!</p>
        <p></p>
        <p>Sua senha foi resetada no sistema <a href="{{URL::to('/')}}">Rede América Premios</a></p>
        <p></p>
        <p>Sua nova senha de acesso é {{ $user->senha }}</p>
        <p>Att, <br>
        Rede América!</p>
    </body>
</html>