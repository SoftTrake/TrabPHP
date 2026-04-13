<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Parcial</title>
</head>
<body>
    <h2>Atualização parcial do produto</h2>
    <p>Apenas o ID é obrigatório. Preencha somente os campos que deseja alterar.</p>
    <form method="POST">
        <label for="id">ID do produto: </label>
        <input type="text" name="id" required><br><br>
        <label for="title">Nome do produto: </label>
        <input type="text" name="title"><br><br>
        <label for="description">Descrição: </label>
        <input type="text" name="description"><br><br>
        <label for="price">Preço: </label>
        <input type="number" name="price" step="0.01"><br><br>
        <label for="category">Categoria: </label>
        <input type="text" name="category"><br><br>
        <label for="brand">Marca: </label>
        <input type="text" name="brand"><br><br>
        <button type="submit">Atualizar</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];

            $dadosParaEnvio = [];

            if (!empty($_POST["title"]))
                $dadosParaEnvio["title"] = $_POST["title"];

            if (!empty($_POST["description"]))
                $dadosParaEnvio["description"] = $_POST["description"];

            if (!empty($_POST["price"]))
                $dadosParaEnvio["price"] = floatval($_POST["price"]);

            if (!empty($_POST["category"]))
                $dadosParaEnvio["category"] = $_POST["category"];

            if (!empty($_POST["brand"]))
                $dadosParaEnvio["brand"] = $_POST["brand"];

            if (empty($dadosParaEnvio)) {
                echo "<br>Nenhum dado para ser atualizado.";
            } else {
                $urlAPI = "https://dummyjson.com/products/$id";

                $curl = curl_init($urlAPI);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dadosParaEnvio));
                curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

                $response = curl_exec($curl);

                if (curl_errno($curl)) {
                    echo "Erro na requisição: " . curl_error($curl);
                } else {
                    $dados = json_decode($response, true);

                    echo "<h3>Produto atualizado parcialmente!</h3>";
                    echo "ID: " . $dados["id"] . "<br>";
                    echo "Nome: " . $dados["title"] . "<br>";
                    echo "Preço: $" . $dados["price"] . "<br>";
                    echo "Categoria: " . $dados["category"] . "<br>";
                }
                curl_close($curl);
            }
        }
    ?>

    <br><a href="index.php">Voltar</a>
</body>
</html>
