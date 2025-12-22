<?php

namespace App\Controller;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Annotations\Instantiate;
use App\Repository\PessoaRepository;
use Framework\Libs\DataBase\WhereQueryBuilder;

#[Controller]
class Main {
    #[Instantiate]
    private PessoaRepository $pessoaRepository;
    #[Mapping("/")]
    public function main() {
        $query = $this->pessoaRepository->select([
            'nome', 
            'idade',
            "(
                SELECT nome FROM pessoa WHERE nome = 'teste' LIMIT 1
            ) AS outro"
        ])->where(function(WhereQueryBuilder $where): void {
            $where->and(
                'nome', '=', 'pao'
            )->or(
                'id', '>=', 50
            )->notNull('deleted_at');
        })
        ->innerJoin('endereco', 'endereco.id', '=', 'pessoa.id_endereco')
        ->leftJoin('pedido', 'pedido.id', '=', 'pessoa.id_pedido')
        ->orderByDESC('nome')
        ->orderByASC('idade')
        ->limit(100)
        ->run();

        
    }
}