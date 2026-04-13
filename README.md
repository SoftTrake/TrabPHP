# Gerenciador de Produtos - DummyJSON API

Projeto da disciplina de Programação Web.
Aluno: David Vinícius Dias de Oliveira - 2° Semestre, período noturno.
Curso: Análise e Desenvolvimento de Sistemas - FATEC TAQUARITINGA.

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
- `consultar.php` - Consultar produto por ID
- `cadastrar.php` - Cadastrar produto
- `atualizar.php` - Atualizar produto completo
- `atualizar_parcial.php` - Atualizar produto parcial
- `excluir.php` - Excluir produto
