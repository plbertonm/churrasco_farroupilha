<?php

require_once "../config/conexao.php";
$id = $_GET["id"] ?? "";
$sql = "SELECT * FROM participantes WHERE id = $id";
$resultado = $conexao->query($sql);
$participante = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar participante</title>
</head>

<body>
    <h1>Editar participante</h1>

    <form action="atualizar.php" method="post">

        <input type="hidden" name="id" value="<?= $participante["id"] ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($participante["nome"]) ?>">

        <label>Turma:</label>
        <input type="text" name="turma" value="<?= htmlspecialchars($participante["turma"]) ?>">

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?= htmlspecialchars($participante["telefone"]) ?>">

        <label>Tipo de churrasco:</label>
        <input type="text" name="tipo_churrasco" value="<?= htmlspecialchars($participante["tipo_churrasco"]) ?>">

        <label>Acompanhamento:</label>
        <input type="text" name="acompanhamento" value="<?= htmlspecialchars($participante["acompanhamento"]) ?>">

        <label>Presença:</label>
        <select name="confirmado">
            <option value="1" <?= $participante["confirmado"] == 1 ? "selected" : "" ?>>
                Confirmado
            </option>
            <option value="0" <?= $participante["confirmado"] == 0 ? "selected" : "" ?>>
                Não confirmado
            </option>
        </select>
        <label>Pagamento:</label>
        <select name="pago">
            <option value="1" <?= $participante["pago"] == 1 ? "selected" : "" ?>>
                Pago
            </option>
             <option value="0" <?= $participante["pago"] == 0 ? "selected" : "" ?>>
                Pendente
            </option>
        </select>
        <button type="submit">Salvar alterações</button>
    </form>
    <br>
    <a href="listar.php">Voltar</a>

</body>
</html>