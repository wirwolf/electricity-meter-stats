<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Modules\User\Forms;

use SomeBlackMagic\Yii2User\Traits\ModuleTrait;
use Yii;
use yii\base\Model;

/**
 * Registration form collects user input on registration process, validates it and creates new User model.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationForm extends \SomeBlackMagic\Yii2User\Models\RegistrationForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        unset($rules['usernameUnique']);
        unset($rules['usernamePattern']);
        return $rules;
    }

}
