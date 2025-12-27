<?php

use Framework\Kernel\Kernel;
use Framework\Kernel\Router\RoutesKernel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './vendor/autoload.php';

Kernel::getInstance()->startKernel(RoutesKernel::class);

