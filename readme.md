# Book Info PHP 

A **Book Info PHP** é uma API simples para buscar informações sobre livros utilizando a biblioteca Open Library.

## Documentação da API

### Esta rota permite pesquisar por livros com base em um título fornecido.

```http
  GET /search/book/:title
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `title` | `string` | **Obrigatório**. O título do livro que você deseja pesquisar. |

**exemplo de uso da rota:**
```http
  /search/book/harry potter
```

```json
[
  {
    "title": "Harry Potter and the Philosopher's Stone",
    "author": "J. K. Rowling",
    "summary": "Resumo não fornecido"
  },
  {
    "title": "Harry Potter and the Chamber of Secrets",
    "author": "J. K. Rowling",
    "summary": "Resumo não fornecido"
  },
  ...
]

```

### Esta rota permite pesquisar por livros com base em uma categoria fornecida.

```http
  GET /book/category/:category
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `category`      | `string` | **Obrigatório**. A categoria do livro que você deseja pesquisar |

**exemplo de uso da rota:**
```http
  /book/category/fiction
```

```json
[
  {
    "title": "To Kill a Mockingbird",
    "authors": ["Harper Lee"]
  },
  {
    "title": "1984",
    "authors": ["George Orwell"]
  },
  ...
]
```

### Esta rota retorna 4 recomendações aleatórias de livros.


```http
  GET /book/recommendations
```

**exemplo de uso da rota:**
```http
  /book/recommendations
```

```json
[
  {
    "title": "Pride and Prejudice",
    "author": "Jane Austen",
    "summary": "lorem ipsum dolor at..."
  },
  {
    "title": "The Great Gatsby",
    "author": "F. Scott Fitzgerald",
    "summary": "lorem ipsum dolor at..."
  },
  ...
]

```


## Configuração do CORS

A API está configurada para permitir solicitações de diferentes origens (CORS) para garantir que ela possa ser acessada de diferentes aplicativos da web. Os seguintes cabeçalhos CORS estão configurados:

    Access-Control-Allow-Origin: *
    Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS
    Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept


## Instalação

- Primeiro, instale o projeto utilizando o comando abaixo:

```sh
composer install
```

- Compilando o projeto e criando ambiente local para desenvolvimento:

```sh
php -S localhost:8000 -t public
```

- Compilando e minificando para Produção:

```sh
composer build
```
## Considerações finais

A Book Info PHP é uma API simples para buscar informações sobre livros utilizando a biblioteca Open Library. Sinta-se à vontade para explorar as diferentes rotas disponíveis e experimentar diferentes parâmetros para obter os resultados desejados.

Se você tiver alguma dúvida ou precisar de ajuda adicional, não hesite em entrar em contato!

Divirta-se explorando a Book Plus API!