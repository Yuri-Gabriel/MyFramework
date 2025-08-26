<?php

namespace App\Middleware;

use Framework\Libs\Annotations\Middleware;
use Framework\Libs\Http\Interceptable;

#[Middleware]
class Barragem implements Interceptable {
    public function rule(): bool {
        echo "middleware 1<br>";
        return true;
    }
}
