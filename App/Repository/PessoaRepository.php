<?php

namespace App\Repository;

use App\Model\Pessoa;
use Framework\Libs\DataBase\Repository;

class PessoaRepository extends Repository {
    public function __construct() {
        parent::__construct(Pessoa::class);
    }
}