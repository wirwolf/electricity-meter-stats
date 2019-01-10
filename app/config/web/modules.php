<?php
/**
 * Created by IntelliJ IDEA.
 * User: wir_wolf
 * Date: 17.07.17
 * Time: 17:46
 */
return [
    'user' => [
        'class' => \App\Modules\User\Module::class,
        'controllerMap' => [
            'security' => \App\Modules\User\Controllers\SecurityController::class
        ],
    ],
];