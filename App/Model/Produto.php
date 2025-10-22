<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\ForeignKey;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("produto")]
class Produto {
    #[PrimaryKey]
    #[Collumn("id")]
    public int $id;

    #[Collumn("nome")]
    public string $nome;

    #[Collumn("preco")]
    public float $preco;

    // Chave Estrangeira obrigatória (nullable = false) para Departamento
    #[ForeignKey("id", Departamento::class, false)]
    #[Collumn("id_departamento")]
    public int $id_departamento;
}