<?php
/**
 * @author Andru Cherny 'root'
 * @date: 20.06.18 - 10:59
 */

return [
    'traceLevel'    => 3,
    'flushInterval' => 1,
    'targets'       => [
        [
            'class'           => pahanini\log\ConsoleTarget::class,
            'levels'          => YII_ENV_DEV ?
                [
                    'error',
                    'warning',
                    'info',
                    'trace',
                    'profile'
                ] : [
                    'error',
                    'warning',
                    'info'
                ],
            'displayCategory' => true,
            'displayDate'     => true,
            'exportInterval'  => 1,
            'except'          => [
                'yii\db\*',
                'yii\mongodb\*',
                'yii\base\*',
                'yii\base\View::renderFile',
                'yii\redis\Connection::*'
            ],
        ],
        [
            'class'  => mito\sentry\Target::class,
            'levels' => ['error', 'warning'],
            'except' => [
            
            ],
        ],
        [
            'class'          => \App\Components\LogFileTarget::class,
            'rotateByCopy'   => false,
            'maxFileSize'    => 50240, //50MB
            'maxLogFiles'    => 5,
            'exportInterval' => YII_ENV_PROD ? 1000 : 3000,
            'enableRotation' => YII_ENV_DEV ? false : true,
            'logFile'        => '@runtime/logs/cli.log',
            'logVars'        => [],
            'levels'         => YII_ENV_DEV ? [
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
                'yii\db\Transaction:*',
            ],
            'prefix' => function ($message) {
                return sprintf('[%.1fMB/%.2fs]', isset($message[5]) ? $message[5] / 1024 / 1024 : 0, $message[3] - YII_BEGIN_TIME);
            }
        
        ]
    ],
];