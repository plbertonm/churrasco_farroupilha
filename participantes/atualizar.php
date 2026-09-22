<?php

require_once "../config/conexao.php";

$id = $_POST["id"];

$nome = $_POST["nome"];
$turma = $_POST["turma"];
$telefone = $_POST["telefone"];
$tipo_churrasco = $_POST["tipo_churrasco"];
$acompanhamento = $_POST["acompanhamento"];
$confirmado = $_POST["confirmado"];
$pago = $_POST["pago"];

$sql = "UPDATE participantes SET
    nome = '$nome',
    turma = '$turma',
    telefone = '$telefone',
    tipo_churrasco = '$tipo_churrasco',
    acompanhamento = '$acompanhamento',
    confirmado = $confirmado,
    pago = $pago
    WHERE id = $id";

$conexao->query($sql);

header("Location: listar.php");
exit;

?>