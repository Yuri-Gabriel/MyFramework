<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("endereco")]
class Endereco {
    #[PrimaryKey]
    #[Collumn("id")]
    public int $id;

    #[Collumn("rua")]
    public string $rua;

    #[Collumn("cep")]
    public string $cep;

    #[Collumn("cidade")]
    public string $cidade;
}