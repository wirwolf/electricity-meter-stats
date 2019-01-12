<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 12.01.19
 * Time: 10:43
 */

namespace App\Modules\User\Models;


class User extends \SomeBlackMagic\Yii2User\Models\User
{
    public function rules()
    {
        $rules = parent::rules();
        unset($rules['usernameUnique']);
        unset($rules['usernameMatch']);
        return $rules;
    }

}