## Test Driven Development no Backend com Laravel 10.

Este repositório é um exemplo prático e resumido da aplicação de TDD (Test Driven Development) ou Desenvolvimento Guiado por Testes no backend utilizando o Laravel 10 com PHP 8.1.

Como sabemos TDD traz a filosofia onde você primeiro cria o teste antes de codificar as features de regras de negócio do seu software. Nestes exemplos implementamos testes unitários e de integração para uma REST API de Livros.

### Slides do DOJO

Neste link segue a apresentação do DOJO.

https://encurtador.com.br/ehyJ1


### Tecnologias utilizadas

- Laravel 10.10
- Php 8.1
- Faker Php
- Sail
- Php Unit

## Como usar este repositório e fazer os testes?

### 1 - Clonar o repositório

```
git clone git@github.com:mackson/php-laravel-tdd.git

```

<b>Atenção:</b>> Você precisará ter instalado em seu sistema operacional o Docker e o docker-composer para iniciar o projeto.


### 2 - Criando um novo projeto Laravel 10 / Php8.1 com Sail

Se você optou por implementar um novo projeto Laravel 10 com Sail, é possível usar o seguinte comando:

```
curl -s https://laravel.build/php-laravel-tdd?with=mysql | bash

```

Referência: https://laravel.com/docs/10.x/installation


### 3 - Iniciar ou desligar os containers contendo a sua API Laravel e testes

Acesse o repositorio do projeto e insira os comandos

```
-- Iniciar os containers
./vendor/bin/sail up -d

-- Desligar os containers
./vendor/bin/sail down

-- Para facilitar a execução dos comandos você pode criar um alias
alias sail="./vendor/bin/sail"

-- Após a criação do alias basta fazer assim:

sail up -d
sail down

```

### 4 - Execute os seguintes comandos para iniciar os testes
```
sail artisan test

-- Executando apenas um teste específico pelo método
sail artisan test --filter test_media
```

### 5 - Banco de dados em memória para uma nova instalação.

Se você optou por implementar uma nova instalação e utilizar para os seus testes um banco de dados em memória como o sqlite, você precisa definir estes valores na configuração do phpunity.xml


```
<env name="DB_DATABASE" value=":memory:"/>
<env name="DB_CONNECTION" value="sqlite"/>
```

### 6 - Você pode Criar novos testes usando os seguintes comandos por exemplo:
```
-- Comando para criar um arquivo de teste de integração
sail artisan make:test TestesIntegracao/LivrosControllerGetTest

-- Comando para criar um arquivo de teste unitário
sail artisan make:test Mediatest --unit
```

### 7 - Se precisar criar controllers, models, e factories insira os seguintes comandos
```
-- Criando um model com migration e factory
sail artisan make:model Livro -mf

-- Criando um controller
sail artisan make:controller LivroController

```

### 8 - Se precisar criar novas rotas de API

```
// Insira as rotas no arquivo api.php como nos exemplos:

use App\Http\Controllers\LivrosController;

Route::get('livros', 'App\Http\Controllers\LivrosController@index');
Route::post('livros/create', 'App\Http\Controllers\LivrosController@create');

```

### 9 - PHP Unity documentação

https://docs.phpunit.de/en/10.5/assertions.html


