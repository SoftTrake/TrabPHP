<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Contato</title>
</head>
<body>
 
<h2>Cadastrar Contato</h2>
 
<form action="cadastrar.php" method="POST">
 
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>
 
    <label>Telefone:</label><br>
    <input type="text" name="telefone"><br><br>
 
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>
 
    <label>Observações:</label><br>
    <textarea name="observacoes"></textarea><br><br>
 
    <button type="submit">Salvar</button>
 
</form>
 
<br>
<a href="index.php">Voltar</a>
 
</body>
</html>