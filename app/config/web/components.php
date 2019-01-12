<?php
/**
 * Created by IntelliJ IDEA.
 * User: wir_wolf
 * Date: 17.07.17
 * Time: 17:46
 */

use App\Helpers\Env;

return [
    'db' => require APP_ROOT . 'config/common/db.php',
    'redis'   => require APP_ROOT . '/config/common/redis.php',

    'request' => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => 'hsers656ejdfs&i6EUREFSTY54WUWrset56U',
        'parsers' => [
            'application/json' => yii\web\JsonParser::class,
        ]
    ],
    'cache' => yii\caching\FileCache::class,

    'sentry' => [
        'class' => mito\sentry\Component::class,
        'dsn' => Env::get('APP_SENTRY_DSN', ''),
        'environment' => YII_ENV.'_web', // if not set, the default is `production`
        'enabled' => YII_ENV_DEV ? false : true
    ],
    

    'mysqlRedisCache' => yii\redis\Cache::class,

    'log'   => [
        'traceLevel' => 3,
        'targets' => [
            [
                'class' => mito\sentry\Target::class,
                'levels' => ['error', 'warning'],
                'except' => [
                    'yii\debug\Module::checkAccess',
                    'yii\web\HttpException:404',
                    'yii\web\HttpException:405',
                    'yii\web\HttpException:401',
                ],
            ],
            [
                'class' => yii\log\FileTarget::class,
                'rotateByCopy'   => false,
                'maxFileSize'    => 50240, //50MB
                'maxLogFiles'    => 5,
                'exportInterval' => YII_ENV_PROD ? 1000 : 3000,
                'enableRotation' => YII_ENV_DEV ? false : true,
                'logFile' => '@runtime/logs/web.log',
                'levels' => YII_ENV_DEV
                    ? [
                        'error',
                        'warning',
                        'info',
                        'trace',
                        'profile'
                    ] : [
                        'error',
                        'warning',
                        'info',
                        'trace',
                    ],
                'fileMode' => 0664,
                'except'   => [
                    'yii\debug\Module::checkAccess',
                    'yii\redis\Connection:*',
                    'yii\db\Command:*',
                    'yii\db\Transaction:*'
                ],
            ]
        ],
    ],

    'errorHandler' => [
        'errorAction' => 'site/error',
    ],

    'urlManager' => [
        'class' => \yii\web\UrlManager::class,
        'baseUrl' => Env::get('APP_BASE_URL', '/'),
        'showScriptName' => false,
        'enablePrettyUrl' => true,
        'rules' => [
            '<action:\w+>' => 'site/<action>', // <-- use UserController by default
            '<controller:\w+>/<id:\d+>' => '<controller>/view',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ]
    ],
    'user'       => [
        'identityClass' => \SomeBlackMagic\Yii2User\Models\User::class,
        'loginUrl' => ['user/login']
    ],
    'i18n'       => [
        'translations' => [
            '*' => [
                'class' => \yii\i18n\DbMessageSource::class,
                'db'    => 'db'
            ],
        ],
    ],
    'reCaptcha'  => [
        'name'    => 'reCaptcha',
        'class'   => himiklab\yii2\recaptcha\ReCaptcha::class,
        'siteKey' => Env::get('APP_RECAPTCHA_SITE_KEY', ''),
        'secret'  => Env::get('APP_RECAPTCHA_SECRET', ''),
    ],

    'mailer'          => require APP_ROOT.'config/common/mailer.php',

    'formatter'       => [
        'class'          => yii\i18n\Formatter::class,
        'dateFormat'     => 'Y-M-d',
        'datetimeFormat' => \App\Components\BaseModel::DB_DATE_TIME_FORMAT,
        'timeFormat'     => 'H:i:s',
    ],
    'assetManager' => [
        'class' => \yii\web\AssetManager::class,
        'baseUrl' => '@web' . Env::get('APP_BASE_URL', '/') . 'assets',
    ],
    
    'authManager' => require APP_ROOT . 'config/common/authManager.php',
    /*'view' => [
        'theme' => [
            //'pathMap' => [
                //'@vendor/someblackmagic/yii2-user/src/Views' => '@App/Modules/User/Views',
                //'@App/Modules/User/Views' => '@vendor/someblackmagic/yii2-user/src/Views'
            //]
        ]
    ]*/
];