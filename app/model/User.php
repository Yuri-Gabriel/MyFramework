<?php

namespace App\Model;

use Framework\Libs\Annotations\DataBase\Collumn;
use Framework\Libs\Annotations\DataBase\Model;
use Framework\Libs\Annotations\DataBase\PrimaryKey;

#[Model("user")]
class User {
    #[PrimaryKey]
    #[Collumn]
    public $id;

    #[Collumn]
    public $username;

    #[Collumn]
    public $email;

    #[Collumn]
    public $password;
}