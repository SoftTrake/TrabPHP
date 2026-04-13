<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    <h2>Excluir Produto</h2>
    <form method="POST">
        <label for="id">ID do produto: </label>
        <input type="text" name="id" required><br><br>
        <button type="submit">Excluir</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];

            $urlAPI = "https://dummyjson.com/products/$id";

            $curl = curl_init($urlAPI);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                echo "Falha na requisição: " . curl_error($curl);
            } else {
                $dados = json_decode($response, true);

                if (isset($dados["isDeleted"]) && $dados["isDeleted"] == true) {
                    echo "<h3>Produto excluído com sucesso!</h3>";
                    echo "ID: " . $dados["id"] . "<br>";
                    echo "Nome: " . $dados["title"] . "<br>";
                    echo "Data da exclusão: " . $dados["deletedOn"] . "<br>";
                } else {
                    echo "Não foi possível excluir o produto.";
                }
            }
            curl_close($curl);
        }
    ?>

    <br><a href="index.php">Voltar</a>
</body>
</html>
