<?php

declare(strict_types = 1);

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

(new Dotenv(false))->loadEnv(dirname(__DIR__).'/.env');
