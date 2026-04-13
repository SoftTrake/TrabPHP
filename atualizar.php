<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
</head>
<body>
    <h2>Atualizar Produto</h2>
    <form method="POST">
        <label for="id">ID do produto: </label>
        <input type="text" name="id" required><br><br>
        <label for="title">Nome do produto: </label>
        <input type="text" name="title" required><br><br>
        <label for="description">Descrição: </label>
        <input type="text" name="description" required><br><br>
        <label for="price">Preço: </label>
        <input type="number" name="price" step="0.01" required><br><br>
        <label for="category">Categoria: </label>
        <input type="text" name="category" required><br><br>
        <label for="brand">Marca: </label>
        <input type="text" name="brand" required><br><br>
        <button type="submit">Atualizar</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];

            $dadosParaEnvio = [
                "title" => $_POST["title"],
                "description" => $_POST["description"],
                "price" => floatval($_POST["price"]),
                "category" => $_POST["category"],
                "brand" => $_POST["brand"]
            ];

            $urlAPI = "https://dummyjson.com/products/$id";

            $curl = curl_init($urlAPI);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dadosParaEnvio));
            curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                echo "Erro na requisição: " . curl_error($curl);
            } else {
                $dados = json_decode($response, true);

                echo "<h3>Produto atualizado com sucesso!</h3>";
                echo "ID: " . $dados["id"] . "<br>";
                echo "Nome: " . $dados["title"] . "<br>";
                echo "Descrição: " . $dados["description"] . "<br>";
                echo "Preço: $" . $dados["price"] . "<br>";
                echo "Categoria: " . $dados["category"] . "<br>";
                echo "Marca: " . $dados["brand"] . "<br>";
            }
            curl_close($curl);
        }
    ?>

    <br><a href="index.php">Voltar</a>
</body>
</html>
