<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\ForeignKey;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("departamento")]
class Departamento {
    #[PrimaryKey]
    #[Collumn("id")]
    public int $id;

    #[Collumn("nome")]
    public string $nome;

    #[Collumn("sigla")]
    public string $sigla;
}