<?php

require_once "../config/conexao.php";
$sql = "SELECT * FROM participantes";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de participantes</title>
</head>
<body>
<h1>Lista de participantes</h1>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Turma</th>
        <th>Tipo</th>
        <th>Presença</th>
        <th>Pagamento</th>
        <th>Ações</th>
    </tr>
    <?php while ($churras = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($churras["Nome"]) ?></td>
            <td><?= htmlspecialchars($churras["Turma"]) ?></td>
            <td><?= htmlspecialchars($churras["Tipo"]) ?></td>
            <td><?= htmlspecialchars($churras["Presenca"]) ?></td>
            <td><?= htmlspecialchars($churras["Pagamento"]) ?></td>
            <td>
                <a href="editar.php?id=<?= $churras["id"] ?>">Editar</a>
                <a href="excluir.php?id=<?= $churras["id"] ?>">Excluir</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
<a href="index.php">Voltar</a>
</body>
</html>