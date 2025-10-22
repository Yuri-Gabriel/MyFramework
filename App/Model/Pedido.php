<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\ForeignKey;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("pedido")]
class Pedido {
    #[PrimaryKey]
    #[Collumn("id")]
    public int $id;

    #[Collumn("data_pedido")]
    public string $data_pedido; // Armazenado como string/datetime

    #[Collumn("status")]
    public string $status;

    // Chave Estrangeira para o Usuario que fez o pedido
    #[ForeignKey("id", Usuario::class, false)]
    #[Collumn("id_usuario")]
    public int $id_usuario;
}