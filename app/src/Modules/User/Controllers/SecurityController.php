<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 09.01.19
 * Time: 21:23
 */

namespace App\Modules\User\Controllers;


class SecurityController extends \SomeBlackMagic\Yii2User\Controllers\SecurityController
{
    public $layout = 'login';

    public function setLayout() {
        var_dump('die');
        die;
    }

    public function getLayout() {
        return 'login';
    }
}