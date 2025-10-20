<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\ForeignKey;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("pessoa")]
class Pessoa {

    #[PrimaryKey]
    #[Collumn("id")]
    public int $id;

    #[Collumn("nome")]
    public string $nome;

    #[ForeignKey("id", Endereco::class)]
    #[Collumn("id_endereco")]
    public int $id_endereco;
}