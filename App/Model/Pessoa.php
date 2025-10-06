<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Column;
use Framework\Libs\Annotations\DataBase\ForeignKey;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model]
class Pessoa {

    #[PrimaryKey]
    #[Column("id_pessoa")]
    public int $id;

    #[Column("nome")]
    public string $nome;

    #[ForeignKey("id_endereço", Endereco::class)]
    public int $id_endereço;
}