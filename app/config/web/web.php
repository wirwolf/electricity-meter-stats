<?php

use App\Helpers\Env;

$config = [
    'id'                  => 'app-api',
    'name'                => 'app',
    'basePath'            => APP_ROOT . 'src/',
    'vendorPath'          => APP_ROOT . 'vendor/',
    'runtimePath'         => Env::get('APP_RUNTIME_PATH', APP_ROOT . 'storage/runtime/'),
    'controllerNamespace' => 'App\Controllers',
    'viewPath'            => APP_ROOT . 'src/Views',
    'language'            => 'ru-RU',// set target language to be Russian
    'sourceLanguage'      => 'en-US', // set source language to be English
    'layout'              => 'main',
    'defaultRoute'        => 'site/index',
    'catchAll'            => Env::get('APP_MAINTAIN_MODE', false) ? ['site/offline']: [],
    'aliases'             => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'bootstrap'           => [
        'log',
        \App\Modules\User\Bootstrap::class
    ],
    'components'          => require __DIR__ . '/components.php',
    'modules'             => require __DIR__ . '/modules.php',
    'params'              => require APP_ROOT . 'config/common/params.php'
];
if (Env::get('APP_GII_ENABLED', true)) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class'      => yii\gii\Module::class,
        'allowedIPs' => explode(',', Env::get('APP_GII_IPS', '127.0.0.1,::1,*')),
        'generators' => [
            'model' => [
                'class'     => 'yii\gii\generators\model\Generator',
                'queryNs'   => 'App\Modules\Database',
                'ns'        => 'App\Modules\Database',
                //'baseClass' => App\Components\BaseModel::class
            ],
            'fixtureClass'    => ['class' => \insolita\fixturegii\generators\ClassGenerator::class],
            'fixtureData'     => ['class' => \insolita\fixturegii\generators\DataGenerator::class],
            'fixtureTemplate' => [
                'class'   => \insolita\fixturegii\generators\TemplateGenerator::class,
                'tplPath' => '@tests/fixtures/data',
            ],
        ],
    ];
}
if (Env::get('APP_DEBUG_PANEL_ENABLED', true)) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'       => yii\debug\Module::class,
        'historySize' => Env::get('APP_DEBUG_PANEL_HISTORY_SIZE', 20000),
        'dataPath'    => Env::get('APP_DEBUG_PANEL_STORAGE_FOLDER', '@runtime/debug'),
        'allowedIPs'  => explode(',', Env::get('APP_DEBUG_PANEL_IPS', '127.0.0.1,::1,*')),
    ];
}
return $config;