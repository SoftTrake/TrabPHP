<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cor"])) {
        setcookie("cor_usuario", $_POST["cor"], time() + 3600);
        header("Location: index.php");
        exit();
    }

    $corFundo = isset($_COOKIE["cor_usuario"]) ? $_COOKIE["cor_usuario"] : "#FFFFFF";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Produtos</title>
</head>
<body style="background-color:<?php echo $corFundo; ?>">
    <h2>Gerenciador de Produtos - DummyJSON</h2>

    <form method="POST">
        <label for="cor">Selecione a cor de fundo: </label>
        <input type="color" name="cor" value="<?php echo $corFundo; ?>">
        <button type="submit">Aplicar</button>
    </form>
    <a href="limpar_cookie.php">Limpar cor</a>

    <hr>

    <h3>Menu</h3>
    <ul>
        <li><a href="consultar.php">Consultar Produto</a></li>
        <li><a href="cadastrar.php">Cadastrar Produto</a></li>
        <li><a href="atualizar.php">Atualizar Produto</a></li>
        <li><a href="atualizar_parcial.php">Atualizar Parcial</a></li>
        <li><a href="excluir.php">Excluir Produto</a></li>
    </ul>

    <hr>

    <h3>Produtos disponíveis</h3>

    <?php
        $urlAPI = "https://dummyjson.com/products?limit=5";

        $curl = curl_init($urlAPI);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo "Erro ao carregar produtos: " . curl_error($curl);
        } else {
            $dados = json_decode($response, true);

            if (isset($dados["products"])) {
                foreach ($dados["products"] as $produto) {
                    echo "ID: " . $produto["id"] . "<br>";
                    echo "Nome: " . $produto["title"] . "<br>";
                    echo "Preço: $" . $produto["price"] . "<br>";
                    echo "Categoria: " . $produto["category"] . "<br>";
                    echo '<img src="' . $produto["thumbnail"] . '" width="100"><br>';
                    echo "<br>";
                }
            }
        }

        curl_close($curl);
    ?>
</body>
</html>
