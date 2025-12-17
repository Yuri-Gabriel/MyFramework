<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\Nullable;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("departamento")]
class Departamento {
    #[PrimaryKey]
    #[Collumn("id")]
    public int $id_departamento;

    #[Collumn("nome")]
    #[Nullable]
    public string $nome;

    #[Collumn("sigla")]
    public string $sigla;
}