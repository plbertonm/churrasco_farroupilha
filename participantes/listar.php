<?php

require_once "../config/conexao.php";

$pesquisa = $_GET["pesquisa"] ?? "";
$pagamento = $_GET["pagamento"] ?? "";
$presenca = $_GET["presenca"] ?? "";

$sql = "SELECT * FROM participantes WHERE nome LIKE '%$pesquisa%'";

if ($pagamento !== "") {
    $sql .= " AND pago = $pagamento";
}

if ($presenca !== "") {
    $sql .= " AND confirmado = $presenca";
}

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

    <h3>Pesquisar</h3>
        <input type="text" name="pesquisa" placeholder="Pesquisar participante" >

    <h3>Pagamento</h3>
    <select name="pagamento">
        <option value="">Todos</option>
        <option value="1">Pagos</option>
        <option value="0">Pendentes</option>
    </select>

    <h3>Presenca</h3>
    <select name="presenca">
        <option value="">Todos</option>
        <option value="1">Confirmados</option>
        <option value="0">Não confirmados</option>
    </select>

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
            <td><?= ($churras["confirmado"] ? "Sim" : "Não") ?></td>
            <td><?= ($churras["pago"] ? "Sim" : "Não") ?></td>
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