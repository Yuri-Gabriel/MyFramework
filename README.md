# MyFramework — Documentação Completa

Este README descreve como usar os principais componentes do framework: Controllers, Middlewares, Models, Repositories, QueryBuilder e como configurar o Kernel (variáveis de ambiente e conexão com o banco). Também inclui um tutorial passo-a-passo para criar um novo módulo.

**Sumário**
- **Controllers**
- **Middlewares**
- **Models & Repositories**
- **QueryBuilder**
- **Kernel / Configuração (.env)**
- **Tutorial: criar um novo módulo**

## **Controllers**
- **O que são**: Classes anotadas com `#[Controller]`. Métodos dentro do controller são rotas quando anotados com `#[Mapping(path, httpMethod)]`.
- **Injeção de dependência**: Propriedades públicas anotadas com `#[Instantiate]` são instanciadas automaticamente (ex.: `Request`, `Response`, repositórios).
- **Exemplo**: [app/controller/Main.php](app/controller/Main.php)

## **Middlewares**
- **O que são**: Classes anotadas com `#[Middleware]` que implementam `Interceptable` (método `rule(): bool`).
- **Aplicação**: Use `#[Interceptors([YourMiddleware::class])]` em um controller ou método para aplicar regras antes da execução da rota.
- **Exemplo**: [app/middleware/Bearer.php](app/middleware/Bearer.php)

## **Models & Repositories**
- **Models**: Marcados com `#[Model("table_name")]`. Campos usam `#[Collumn]`, `#[PrimaryKey]` e outras anotações de banco.
- **Repositories**: Estendem `Framework\Libs\DataBase\Repository` e recebem a `Model::class` no construtor; fornecem acesso ao `QueryBuilder` para operações.
- **Exemplos**: [app/model/User.php](app/model/User.php) e [app/repository/UserRepository.php](app/repository/UserRepository.php)

**QueryBuilder — visão geral**
- Implementado em `Framework\Libs\DataBase\Query`. Principais classes:
  - `QueryBuilder` — pontos de entrada (`select`, `insert`, `update`, `delete`).
  - `SelectBuilder`, `InsertBuilder`, `UpdateBuilder`, `DeleteBuilder` — constroem a query em cadeia.
  - `WhereQueryBuilder` — auxilia a construção de cláusulas WHERE com métodos `and`, `or`, `isNull`, `notNull`.

**Exemplos práticos (QueryBuilder)**

- SELECT com WHERE, JOIN, ORDER BY e LIMIT

```php
$data = $this->userRepository
    ->select(['u.id', 'u.username', 'p.name'])
    ->innerJoin('profile p', 'p.user_id', '=', 'u.id')
    ->where(function($w) {
        $w->and('u.active', '=', 1)
          ->and('u.username', '!=', 'guest')
          ->or('u.role', '=', 'admin');
    })
    ->orderByDESC('u.created_at')
    ->limit(50)
    ->run();
```

- Observações sobre `WhereQueryBuilder`: ele concatena condições em SQL simples; valores string são automaticamente envoltos em aspas simples pelo builder (`'value'`).

- INSERT

```php
$this->userRepository
    ->insert(['username' => 'jdoe', 'email' => 'jdoe@example.com', 'password' => 'hash'])
    ->run();
```

- UPDATE

```php
$this->userRepository
    ->update(['username' => "'newname'", 'email' => "'new@example.com'"])
    ->where(function($w) {
        $w->and('id', '=', 10);
    })
    ->run();
```

- DELETE

```php
$this->userRepository
    ->delete(['id' => 10])
    ->run();
```

- Observações importantes sobre segurança:
  - O builder corrente monta SQL concatenando valores; não há binding de parâmetros na implementação atual — cuide contra SQL injection.
  - Para dados vindos de usuários, sanitize/escape ou estenda o `Repository`/`Conection` para usar prepared statements com parâmetros.

**Kernel & configuração (.env)**
- O carregamento de variáveis de ambiente é feito por `Framework\Kernel\EnvLoad` lendo o arquivo `.env` na raiz do projeto. Regras básicas:
  - Cada linha no formato `KEY=VALUE` (aspas simples ou duplas são suportadas e removidas).
  - Linhas começando com `#` são tratadas como comentários.
  - As variáveis são atribuídas em `$_ENV`.

- Variáveis obrigatórias para conexão com banco (usadas por `Framework\Libs\DataBase\Conection`):
  - `DB_CONNECTION` (ex.: `mysql`)
  - `DB_HOST`
  - `DB_PORT`
  - `DB_DATABASE`
  - `DB_USERNAME`
  - `DB_PASSWORD`

- Exemplo de `.env` mínimo:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mydb
DB_USERNAME=myuser
DB_PASSWORD=secret
```

- O `Kernel` utiliza `ClassLoader::load('/app')` para carregar classes do diretório `app` e, em seguida, executa kernels (ex.: `ModelKernel`, `RoutesKernel`) que registram modelos e rotas.

## **Tutorial: criar um novo módulo (Controller + Model + Repository + Middleware)**

1) Criar o Model

 - Arquivo: [app/model/Product.php](app/model/Product.php)

```php
<?php
namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("product")]
class Product {
    #[PrimaryKey]
    #[Collumn]
    public $id;

    #[Collumn]
    public $name;

    #[Collumn]
    public $price;
}
```

2) Criar o Repository

 - Arquivo: [app/repository/ProductRepository.php](app/repository/ProductRepository.php)

```php
<?php
namespace App\Repository;

use App\Model\Product;
use Framework\Libs\DataBase\Repository;

class ProductRepository extends Repository {
    public function __construct() {
        parent::__construct(Product::class);
    }
}
```

3) Criar o Controller

 - Arquivo: [app/controller/ProductController.php](app/controller/ProductController.php)

```php
<?php
namespace App\Controller;

use App\Repository\ProductRepository;
use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Instantiate;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Engine\Render;

#[Controller]
class ProductController {
    #[Instantiate]
    public ProductRepository $repo;

    #[Mapping('/products')]
    public function index() {
        $data = $this->repo->select(['*'])->run();
        Render::render('products/index');
    }
}
```

4) (Opcional) Criar Middleware

 - Arquivo: [app/middleware/AdminOnly.php](app/middleware/AdminOnly.php)

```php
<?php
namespace App\Middleware;

use Framework\Libs\Annotations\Middleware;
use Framework\Libs\Http\Interceptable;

#[Middleware]
class AdminOnly implements Interceptable {
    public function rule(): bool {
        // checar autorização
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
    }
}
```

E aplicar com `#[Interceptors([AdminOnly::class])]` no controller ou método.

5) Testar localmente

 - Inicie o servidor embutido (na raiz do projeto):

```bash
php command run
```

 - Acesse `http://localhost:8000/` ou faça requisições com `curl`:

```bash
curl http://localhost:8000/products
```
