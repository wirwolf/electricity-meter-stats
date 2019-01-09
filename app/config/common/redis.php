<?php

use App\Helpers\Env;

return [
    'class'    => yii\redis\Connection::class ,
    'hostname' => Env::get('REDIS_HOST', 'redis'),
    'port'     => Env::get('REDIS_PORT', 6379),
    'database' => Env::get('REDIS_DB', 2),
];