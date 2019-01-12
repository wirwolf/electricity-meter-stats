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
            'security' => \App\Modules\User\Controllers\SecurityController::class,
            'registration' => \App\Modules\User\Controllers\RegistrationController::class,
        ],
        'modelMap' => [
            'User' => \App\Modules\User\Models\User::class,
            'RegistrationForm' => \App\Modules\User\Forms\RegistrationForm::class,
        ]
    ],
];