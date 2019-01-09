<?php
/**
 * Created by IntelliJ IDEA.
 * User: wir_wolf
 * Date: 20.07.17
 * Time: 17:37
 */


use App\Helpers\Env;

$config = [
    'id'          => 'skeleton-cli',
    'basePath'    => APP_ROOT . 'src/',
    'vendorPath'  => APP_ROOT . 'vendor/',
    'runtimePath' => Env::get('APP_RUNTIME_PATH', APP_ROOT . 'storage/runtime/'),

    'bootstrap'           => ['log'],
    'controllerNamespace' => 'App\Commands',
    'components'          => require 'components.php',
    'modules'   => [

    ],
    'params'              => include APP_ROOT . 'config/common/params.php',
    'controllerMap'       => [
        'migrate' => [
            'class'         => \yii\console\controllers\MigrateController::class,
            'migrationPath' => [APP_ROOT.'migrations/mysql', '@yii/rbac/migrations'],
        ]
    ],
];


// configuration adjustments for 'dev' environment
$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = [
    'class' => \yii\gii\Module::class,
    'generators' => [
        'model' => [
            //'class'                      => \App\Components\Gii\ModelGenerator::class,
            'class'                      => \yii\gii\generators\model\Generator::class,
            'useTablePrefix'             => true,
            'generateLabelsFromComments' => true,
            'enableI18N'                 => true,
            'queryNs'                    => 'App\Models\Mysql',
            'ns'                         => 'App\Models\Mysql',
            'baseClass'                  => App\Components\BaseModel::class
        ]
    ],
];
return $config;
