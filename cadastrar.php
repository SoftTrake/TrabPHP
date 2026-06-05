<?php
 
require_once("conexao.php");
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $nome        = mysqli_real_escape_string($conexao, trim($_POST["nome"]));
    $telefone    = mysqli_real_escape_string($conexao, trim($_POST["telefone"]));
    $email       = mysqli_real_escape_string($conexao, trim($_POST["email"]));
    $observacoes = mysqli_real_escape_string($conexao, trim($_POST["observacoes"]));
 
    $sql = "INSERT INTO contatos (nome, telefone, email, observacoes)
            VALUES ('$nome', '$telefone', '$email', '$observacoes')";
 
    if (mysqli_query($conexao, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao cadastrar contato: " . mysqli_error($conexao);
    }
}
 
?>