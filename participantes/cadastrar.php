<?php
include_once "../auth/verificar_login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar participante</title>
</head>

<body>
    <h1>Cadastrar participante</h1>

    <form action="atualizar.php" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" >

        <label for="turma">Turma:</label>
        <input type="text" name="turma" >

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" >

        <label>Tipo de churrasco:</label>
        <select name="confirmado">
            <option value="0">
                Tradicional
            </option>
            <option value="1">
                Vegetariano
            </option>
        </select>

        <label for="acompanhamento">Acompanhamento:</label>
        <input type="text" name="acompanhamento" >

        <label for="confirmado">Presença:</label>
        <select name="confirmado">
            <option value="1">
                Confirmado
            </option>
            <option value="0">
                Não confirmado
            </option>
        </select>
        <label for="pago">Pagamento:</label>
        <select name="pago">
            <option value="1">
                Pago
            </option>
             <option value="0">
                Pendente
            </option>
        </select>
        <button type="submit">Salvar alterações</button>
    </form>
    <br>
    <a href="listar.php">Voltar</a>

</body>
</html>