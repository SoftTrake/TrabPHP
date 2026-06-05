<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
</head>
<body>

<h2>Editar Contato</h2>

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

<form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $linha['id'] ?>">

    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($linha['nome']) ?>" required><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value="<?= htmlspecialchars($linha['telefone']) ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($linha['email']) ?>"><br><br>

    <label>Observações:</label><br>
    <textarea name="observacoes"><?= htmlspecialchars($linha['observacoes']) ?></textarea><br><br>

    <button type="submit">Salvar Alterações</button>
    <a href="index.php">Cancelar</a>
</form>

</body>
</html>
