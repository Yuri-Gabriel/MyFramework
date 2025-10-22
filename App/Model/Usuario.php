<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\ForeignKey;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("usuario")]
class Usuario {
    #[PrimaryKey]
    #[Collumn("id")]
    public int $id;

    #[Collumn("username")]
    public string $username;

    #[Collumn("email")]
    public string $email;

    // Um usuário pode ou não ter um endereço cadastrado inicialmente (nullable = true)
    #[ForeignKey("id", Endereco::class, true)]
    #[Collumn("id_endereco")]
    public ?int $id_endereco = null; // A propriedade deve ser nullable em PHP
}