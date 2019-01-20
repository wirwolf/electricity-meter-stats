<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 20.01.19
 * Time: 18:27
 */

namespace App\Modules\Main\Controllers;


use yii\filters\AccessControl;
use yii\web\Controller;

class HousesController extends Controller
{
    /**
     * @var string
     */
    public $layout = '@App/Views/layouts/main';

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow' => true, 'actions' => ['index'], 'roles' => ['@']],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}