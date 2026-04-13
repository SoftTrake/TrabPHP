<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Produto</title>
</head>
<body>
    <h2>Consultar Produto</h2>
    <form method="GET">
        <label for="id">Digite o ID do produto: </label>
        <input type="text" name="id" required><br><br>
        <button type="submit">Consultar</button>
    </form>

    <?php
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id = $_GET["id"];
            $urlAPI = "https://dummyjson.com/products/$id";

            $curl = curl_init($urlAPI);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                echo "Erro na requisição: " . curl_error($curl);
            } else {
                $dados = json_decode($response, true);

                if (isset($dados["id"])) {
                    echo "<h3>Dados do Produto</h3>";
                    echo "ID: " . $dados["id"] . "<br>";
                    echo "Nome: " . $dados["title"] . "<br>";
                    echo "Descrição: " . $dados["description"] . "<br>";
                    echo "Preço: $" . $dados["price"] . "<br>";
                    echo "Desconto: " . $dados["discountPercentage"] . "%<br>";
                    echo "Avaliação: " . $dados["rating"] . "<br>";
                    echo "Estoque: " . $dados["stock"] . "<br>";
                    echo "Categoria: " . $dados["category"] . "<br>";
                    echo '<img src="' . $dados["thumbnail"] . '" width="150"><br>';
                } else {
                    echo "Produto não encontrado.";
                }
            }
            curl_close($curl);
        }
    ?>

    <br><a href="index.php">Voltar</a>
</body>
</html>
