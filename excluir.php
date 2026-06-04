<?php
require 'conexao.php';

$id = (int)$_GET['id'];

if (mysqli_query($conexao, "DELETE FROM contatos WHERE id = $id")) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao excluir: " . mysqli_error($conexao);
}
?>
