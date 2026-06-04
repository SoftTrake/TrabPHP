<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Contato</title>
</head>
<body>

<h2>Excluir Contato</h2>

<?php
require 'conexao.php';

$id = (int)$_GET['id'];

$resultado = mysqli_query($conexao, "SELECT * FROM contatos WHERE id = $id");
$linha = mysqli_fetch_assoc($resultado);

if (!$linha) {
    echo "<p>Contato não encontrado.</p>";
    echo "<a href='index.php'>Voltar</a>";
    exit;
}
?>

<p>Tem certeza que deseja excluir o contato <strong><?= htmlspecialchars($linha['nome']) ?></strong>?</p>

<a href="excluir.php?id=<?= $linha['id'] ?>">Sim, excluir</a> |
<a href="index.php">Cancelar</a>

</body>
</html>
