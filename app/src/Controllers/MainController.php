<?php


declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Arr;
use App\Models\Referral;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\{Controller, ServerErrorHttpException};

/**
 * Class SiteController
 * @package App\Controllers
 */
class MainController extends Controller
{
    /**
     * @return array
     */
    public function actions(): array
    {
        return Arr::merge(parent::actions(), [
           'index' => Main\IndexAction::class,
        ]);
    }

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

}
