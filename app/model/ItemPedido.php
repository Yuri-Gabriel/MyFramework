<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\ForeignKey;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("item_pedido")]
class ItemPedido {
    // Usando uma chave primária simples (surrogate key) para a tabela de junção
    #[PrimaryKey]
    #[Collumn("id")]
    public int $id;

    #[Collumn("quantidade")]
    public int $quantidade;

    #[Collumn("preco_unitario")]
    public float $preco_unitario;

    // Chave Estrangeira para Pedido
    #[ForeignKey("id", Pedido::class, false)]
    #[Collumn("id_pedido")]
    public int $id_pedido;

    // Chave Estrangeira para Produto
    #[ForeignKey("id", Produto::class, false)]
    #[Collumn("id_produto")]
    public int $id_produto;
}