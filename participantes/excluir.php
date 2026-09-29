<?php

require_once __DIR__ . "../config/conexao.php";

$id = $_GET["id"];

$resultado = $conexao->prepare("DELETE FROM participantes WHERE id = ?");
$resultado->bind_param("i", $id);

if ($resultado->execute()) {
    header("Location: listar.php");
    exit;
}

echo "Erro ao excluir: " . $resultado->error;