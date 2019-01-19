<?php

namespace App\Modules\User\Controllers;

/**
 * RecoveryController manages password recovery process.
 *
 * @property \SomeBlackMagic\Yii2User\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RecoveryController extends \SomeBlackMagic\Yii2User\Controllers\RecoveryController
{
    public $layout = 'login';
}
