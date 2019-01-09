<?php
/**
 * Created by PhpStorm.
 * User: Alex Stepanov
 * Date: 4/24/18
 * Time: 5:05 PM
 */

namespace tests\fixtures;

use yii\test\BaseActiveFixture;

class ExampleFixture extends BaseActiveFixture
{
    public $modelClass = ExampleModelClass::class;

    public static function getDefaultValuesByFields(): array
    {
        return [
            'createdAt' => '2017-10-13 15:41:44',
            'minedAt'   => '2017-10-13 15:41:44',
        ];
    }

    public function item1(): array
    {
        return [
            'id' => 1,
            'amount' => 5000000000,
            'fee' => 0,
            'index' => 0,
            'lockTime' => 0,
            'size' => 133,
            'version' => 1
        ];
    }

    public function item2(): array
    {
        return [
            'id' => 2,
            'amount' => 550000000000000,
            'fee' => 0,
            'index' => 0,
            'lockTime' => 0,
            'size' => 98,
            'version' => 2
        ];
    }
}