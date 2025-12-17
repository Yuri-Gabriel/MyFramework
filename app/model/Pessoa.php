<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\ForeignKey;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;
use Framework\Libs\DataBase\Repository;

#[Model("pessoa")]
class Pessoa {

    #[PrimaryKey]
    #[Collumn("id")]
    public int $id;

    #[Collumn("nome")]
    public string $nome;

    #[ForeignKey("id", Endereco::class, true)]
    #[Collumn("id_endereco")]
    public int $id_endereco;
}