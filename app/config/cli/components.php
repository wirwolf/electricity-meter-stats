<?php

use App\Helpers\Env;

return [
    'cache' => yii\caching\FileCache::class,
    'sentry' => [
        'class' => mito\sentry\Component::class,
        'dsn' => Env::get('APP_SENTRY_DSN', ''),
        'environment' => YII_ENV.'_cli', // if not set, the default is `production`
        'enabled' => YII_ENV_DEV ? false : true
    ],

    'mysqlRedisCache' => yii\redis\Cache::class,

    'log'   => require 'componentsLog.php',
//        'user'       => [
//            //'class'           => \App\Modules\User\Components\WebUser::class,
//            //'identityClass' => \App\Modules\User\Components\AbstractIdentity::class, // User must implement the IdentityInterface
//            'enableAutoLogin' => true,
//            'enableSession'   => false,
//            'loginUrl'        => null
//        ],
    'i18n'       => [
        'translations' => [
            '*' => [
                'class' => yii\i18n\DbMessageSource::class,
                'db'    => 'db'
            ],
        ],
    ],
    'db'        => include APP_ROOT . 'config/common/db.php',
    'redis'     => require APP_ROOT . 'config/common/redis.php',
    'authManager' => require APP_ROOT . 'config/common/authManager.php',
    'mailer'      => require APP_ROOT.'config/common/mailer.php',
    'urlManager' => [
        'class' => \yii\web\UrlManager::class,
        'hostInfo' => Env::get('APP_CLI_HOST_INFO', 'http://localhost/'),
        'scriptUrl' => Env::get('APP_CLI_HOST_INFO', 'http://localhost/'),
        'showScriptName' => false,
        'enablePrettyUrl' => true,
        'baseUrl' => Env::get('APP_BASE_URL', '/'),
    ],

    'formatter'       => [
        'class'          => yii\i18n\Formatter::class,
        'dateFormat'     => 'Y-M-d',
        'datetimeFormat' => \App\Components\BaseModel::DB_DATE_TIME_FORMAT,
        'timeFormat'     => 'H:i:s',
    ],
];