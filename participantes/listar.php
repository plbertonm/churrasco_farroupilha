<?php

require_once "../config/conexao.php";
$pesquisa = $_GET["pesquisa"] ?? "";
$sql = "SELECT * FROM participantes WHERE Nome LIKE '%$pesquisa%'";
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

    <form action="#" method="get">
        <input type="text" name="pesquisa" placeholder="Pesquisar participante" >
        <button type="submit">Pesquisar</button>
    </form>

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
            <td><?= htmlspecialchars($churras["nome"]) ?></td>
            <td><?= htmlspecialchars($churras["turma"]) ?></td>
            <td><?= htmlspecialchars($churras["tipo_churrasco"]) ?></td>
            <td><?= htmlspecialchars($churras["confirmado"]) ?></td>
            <td><?= htmlspecialchars($churras["pago"]) ?></td>
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