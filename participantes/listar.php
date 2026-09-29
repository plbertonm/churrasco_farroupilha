<?php

include_once __DIR__ . "/../config/conexao.php";
include_once __DIR__ . "/../auth/verificar_login.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];

    if (isset($_POST["confirmado"])) {
        $confirmado = $_POST["confirmado"];

        $resultado = $conexao->prepare("UPDATE participantes SET confirmado = ? WHERE id = ?");
        $resultado->bind_param("ii", $confirmado, $id);
        $resultado->execute();
    }

    if (isset($_POST["pago"])) {
        $pago = $_POST["pago"];

        $resultado = $conexao->prepare("UPDATE participantes SET pago = ? WHERE id = ?");
        $resultado->bind_param("ii", $pago, $id);
        $resultado->execute();
    }
}

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

    <input type="text" name="pesquisa" placeholder="Pesquisar participante">

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
        <th>Situação</th>
        <th>Ações</th>
    </tr>

    <?php while ($churras = $resultado->fetch_assoc()): ?>

        <tr>
            <td><?= htmlspecialchars($churras["nome"]) ?></td>
            <td><?= htmlspecialchars($churras["turma"]) ?></td>
            <td><?= htmlspecialchars($churras["tipo_churrasco"]) ?></td>
            <td>
                <?= ($churras["confirmado"] ? "Confirmada" : "Não confirmada") ?>

                <form action="listar.php" method="post">

                    <input type="hidden" name="id" value="<?= $churras["id"] ?>">

                    <?php if ($churras["confirmado"]): ?>

                        <input type="hidden" name="confirmado" value="0">

                        <button type="submit">Cancelar confirmação</button>

                    <?php else: ?>

                        <input type="hidden" name="confirmado" value="1">

                        <button type="submit">Confirmar presença</button>

                    <?php endif; ?>
                </form>
            </td>
            <td>

                <?= ($churras["pago"] ? "Pago" : "Pagamento pendente") ?>

                <form action="listar.php" method="post">

                    <input type="hidden" name="id" value="<?= $churras["id"] ?>">

                    <?php if ($churras["pago"]): ?>

                        <input type="hidden" name="pago" value="0">

                        <button type="submit">Cancelar pagamento</button>

                    <?php else: ?>

                        <input type="hidden" name="pago" value="1">

                        <button type="submit">Confirmar pagamento</button>

                    <?php endif; ?>
                </form>
            </td>
            <td>
                <?php
                if (!$churras["confirmado"]) {
                    echo "AGUARDANDO CONFIRMAÇÃO";
                } elseif ($churras["pago"]) {
                    echo "INSCRIÇÃO REGULARIZADA";
                } else {
                    echo "PAGAMENTO PENDENTE";
                }
                ?>
            </td>
            <td>
                <a href="editar.php?id=<?= $churras["id"] ?>">Editar</a>
                <a href="excluir.php?id=<?= $churras["id"] ?>" onclick="return confirmarExclusao()">Excluir</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
<a href="../index.php">Voltar</a>
<script src="../js/script.js"></script>
</body>
</html>