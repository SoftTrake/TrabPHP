# Gerenciador de Produtos - DummyJSON API

Projeto da disciplina de Programação Web - FATEC.

CRUD completo em PHP consumindo a API [DummyJSON](https://dummyjson.com/products).

## Conteúdos aplicados

- **Cookies** - preferência de cor de fundo
- **GET** - consulta e listagem de produtos com cURL
- **POST** - cadastro de novo produto
- **PUT** - atualização completa de produto
- **DELETE** - exclusão de produto
- **PATCH** - atualização parcial de produto

## Como executar

1. Ter um servidor PHP (XAMPP, WAMP, Laragon)
2. Clonar o repositório na pasta do servidor (ex: htdocs)
3. Acessar `http://localhost/nome-da-pasta/index.php`

## Arquivos

- `index.php` - Página inicial com cookie de cor e listagem de produtos
- `limpar_cookie.php` - Limpa o cookie de cor
- `consultar.php` - Consultar produto por ID (GET)
- `cadastrar.php` - Cadastrar produto (POST)
- `atualizar.php` - Atualizar produto completo (PUT)
- `atualizar_parcial.php` - Atualizar produto parcial (PATCH)
- `excluir.php` - Excluir produto (DELETE)
