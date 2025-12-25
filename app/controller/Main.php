<?php

namespace App\Controller;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Annotations\Instantiate;
use App\Repository\PessoaRepository;

#[Controller]
class Main {
    #[Instantiate]
    private PessoaRepository $pessoaRepository;
    #[Mapping("/")]
    public function main() {

        // $this->pessoaRepository->insert([
        //     "nome" => "yuri"
        // ])->run();

        $query = $this->pessoaRepository->select([
            '*', 
        ])
        ->run();

        echo "<pre>";
        var_dump($query);

        
    }
}