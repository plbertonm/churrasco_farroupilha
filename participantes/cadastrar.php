<?php
include_once __DIR__ . "/../auth/verificar_login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar participante</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>

    <h1>Cadastrar participante</h1>

    <form action="salvar.php" method="post" id="formCadastro">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <br><br>

        <label for="turma">Turma:</label>
        <input type="text" name="turma" id="turma">

        <br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone">

        <br><br>

        <label for="tipo_churrasco">Tipo de churrasco:</label>
        <select name="tipo_churrasco" id="tipo_churrasco">
            <option value="">Selecione</option>
            <option value="Tradicional">Tradicional</option>
            <option value="Vegetariano">Vegetariano</option>
        </select>

        <br><br>

        <label for="acompanhamento">Acompanhamento:</label>
        <input type="text" name="acompanhamento" id="acompanhamento">

        <br><br>

        <label for="confirmado">Presença:</label>
        <select name="confirmado" id="confirmado">
            <option value="">Selecione</option>
            <option value="1">Confirmado</option>
            <option value="0">Não confirmado</option>
        </select>

        <br><br>

        <label for="pago">Pagamento:</label>
        <select name="pago" id="pago">
            <option value="">Selecione</option>
            <option value="1">Pago</option>
            <option value="0">Pendente</option>
        </select>

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="listar.php">Voltar</a>

    <script src="../js/cadastrar.js"></script>

</body>
</html>
