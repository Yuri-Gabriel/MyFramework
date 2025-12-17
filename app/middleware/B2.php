<?php

namespace App\Middleware;

use Framework\Libs\Annotations\Middleware;
use Framework\Libs\Http\Interceptable;

#[Middleware]
class B2 implements Interceptable {
    public function rule(): bool {
        echo "middleware 2<br>";
        return true;
    }
}
