<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 09.01.19
 * Time: 21:21
 */

namespace App\Modules\User;

use yii\base\Application;
use yii\i18n\PhpMessageSource;

class Bootstrap extends \SomeBlackMagic\Yii2User\Bootstrap
{

    /**
     * @param Application $app
     * @throws \yii\base\InvalidConfigException
     */
    protected function setTranslation(Application $app)
    {
        if (!isset($app->get('i18n')->translations['user*'])) {
            $app->get('i18n')->translations['user*'] = [
                'class'          => PhpMessageSource::class,
                'basePath'       => __DIR__ . '/Messages',
                'sourceLanguage' => 'en-US'
            ];
        }
    }

}