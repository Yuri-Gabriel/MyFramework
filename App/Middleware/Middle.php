<?php

namespace App\Middleware;

use Framework\Libs\Http\Middleware;

class Middle extends Middleware {
    public function rule(): bool {
        echo "meu mniddle <br>";
        return true;
    }
}