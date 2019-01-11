<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 11.01.19
 * Time: 11:42
 */

namespace App\Modules\User\Controllers;


class RegistrationController extends \SomeBlackMagic\Yii2User\Controllers\RegistrationController
{
    public $layout = 'login';
}