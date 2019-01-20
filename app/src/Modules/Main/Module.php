<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 20.01.19
 * Time: 18:25
 */

namespace App\Modules\Main;


class Module extends \yii\base\Module
{
    /**
     * @var string
     */
    public $controllerNamespace = __NAMESPACE__.'\Controllers';

    /**
     * @return string
     */
    public function getViewPath()
    {
        return $this->getBasePath() . DIRECTORY_SEPARATOR . 'Views';
    }
}