<?php
/**
 * User: wir_wolf
 * Date: 20.07.17
 * Time: 17:18
 */

use App\Helpers\Env;

return [
    'language'      => 'en-US',
    'controllerMap' => [
        'fixture' => [
            'class'        => yii\faker\FixtureController::class,
            //'fixtureDataPath' => '@tests/fixtures/fixtures',
            'templatePath' => '@tests/fixtures',
            //'namespace' => 'tests\fixtures',
        ],
    ],
    'components'    => [
        'db'         => [
            'class' => yii\db\Connection::class,
            'dsn' => Env::get('DB_DRIVER', 'mysql') . ':'
                . 'host=' . Env::get('MYSQL_TEST_HOST', 'mysql') . ';'
                . 'port=' . Env::get('MYSQL_TEST_PORT', '3306') . ';'
                . 'dbname=' . Env::get('MYSQL_TEST_DATABASE', 'app_test'),
            'username'    => Env::get('MYSQL_TEST_USER', 'testUser'),
            'password'    => Env::get('MYSQL_TEST_PASSWORD', 'testPass'),
            'tablePrefix' => Env::get('MYSQL_TEST_DB_PREFIX', 'prefix_'),
            'charset'     => 'utf8mb4',
        ],
        'mailer'     => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ]
    ],
];