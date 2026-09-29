<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuário</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>

    <h1>Cadastrar usuário</h1>

    <form action="salvar_usuario.php" method="post" id="formUsuario">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email">

        <br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">

        <br><br>

        <label for="confirmar_senha">Confirmar senha:</label>
        <input type="password" name="confirmar_senha" id="confirmar_senha">

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="login.php">Voltar para o login</a>

    <script src="../js/cadastrar_usuario.js"></script>

</body>

</html>
