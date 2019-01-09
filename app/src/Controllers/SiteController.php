<?php


declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Arr;
use App\Models\Referral;
use Yii;
use yii\db\Expression;
use yii\web\{Controller, ServerErrorHttpException};

/**
 * Class SiteController
 * @package App\Controllers
 */
class SiteController extends Controller
{
    /**
     * @return array
     */
    public function actions(): array
    {
        return Arr::merge(parent::actions(), [
           'index' => Site\ActionIndex::class,
        ]);
    }

    public function actionLogin(): string {
        $this->layout = 'login';
        return $this->render('login', [
        ]);
    }

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::class,
                'formats' => [
                    'application/xml' => \yii\web\Response::FORMAT_HTML,
                ],
            ],
        ];
    }

    public function actionError(): string
    {
        $this->layout = 'pages';

        $exception = Yii::$app->errorHandler->exception;

        switch ($exception->statusCode)
        {
            case 404:
                $result = $this->render('404');
            break;
            case 500:
                $result = $this->render('500',['message' => $exception->getMessage()]);
            break;
            case 403:
                $result = $this->render('500',['message' => $exception->getMessage()]);
            break;
            default:
                $result = $this->render('500',
                    [
                        'message' => 'The server encountered something unexpected that didn\'t allow it to complete the request. We apologize.'
                    ]);
        }
        return $result;
    }
}
