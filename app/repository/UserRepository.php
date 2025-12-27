<?php

namespace App\Repository;

use App\Model\User;
use Framework\Libs\DataBase\Repository;

class UserRepository extends Repository {
    public function __construct() {
        parent::__construct(User::class);
    }
}