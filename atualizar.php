<?php
require 'conexao.php';

$id          = (int)$_POST['id'];
$nome        = mysqli_real_escape_string($conexao, $_POST['nome']);
$telefone    = mysqli_real_escape_string($conexao, $_POST['telefone']);
$email       = mysqli_real_escape_string($conexao, $_POST['email']);
$observacoes = mysqli_real_escape_string($conexao, $_POST['observacoes']);

$sql = "UPDATE contatos 
        SET nome='$nome', telefone='$telefone', email='$email', observacoes='$observacoes'
        WHERE id=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}
?>
