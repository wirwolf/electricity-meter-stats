<?php
/**
 * @author Aleksey Kucherov
 * @date: 13.07.17
 */

use App\Helpers\Env;

return [
    'class'       => yii\db\Connection::class,
    'dsn'         => Env::get('DB_DRIVER', 'mysql') . ':'
        . 'host=' . Env::get('MYSQL_HOST', 'mysql') . ';'
        . 'port=' . Env::get('MYSQL_PORT', '3306') . ';'
        . 'dbname=' . Env::get('MYSQL_DATABASE', 'app_db'),
    'username'    => Env::get('MYSQL_USER', 'user'),
    'password'    => Env::get('MYSQL_PASSWORD', 'pass'),
    'charset'     => 'utf8mb4',
    'tablePrefix' => Env::get('MYSQL_DB_PREFIX', 'prefix_'),

    'enableSchemaCache' => YII_ENV_PROD,
    'schemaCacheDuration' => 86400,
    'schemaCache' => 'mysqlRedisCache',
    'queryCache' => 'mysqlRedisCache',

];