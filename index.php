<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
</head>
<body>
    <h2>Agenda de Contatos</h2>

    <?php
        require 'conexao.php';

        $resultado = mysqli_query($conexao, "SELECT * FROM contatos ORDER BY nome");
    ?>

    <a href="pagina2.php">Cadastrar Contato</a><br><br>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php while($linha = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?= $linha['nome'] ?></td>
            <td><?= $linha['telefone'] ?></td>
            <td><?= $linha['email'] ?></td>
            <td>
                <a href="pagina3.php?id=<?= $linha['id'] ?>">Editar</a>
                <a href="pagina4.php?id=<?= $linha['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>