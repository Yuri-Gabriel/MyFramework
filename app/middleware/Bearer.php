<?php

namespace App\Middleware;

use Framework\Libs\Annotations\Middleware;
use Framework\Libs\Http\Interceptable;

#[Middleware]
class Bearer implements Interceptable {
    public function rule(): bool {
        // Action...
        return true;
    }
}
