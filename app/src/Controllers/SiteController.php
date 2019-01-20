<?php


declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Arr;
use Yii;
use yii\web\Controller;

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
            case 403:
            case 500:
                $result = $this->render('500',['message' => $exception->getMessage(), 'code' => $exception->statusCode]);
            break;
            default:
                $result = $this->render('500',
                    [
                        'message' => 'The server encountered something unexpected that didn\'t allow it to complete the request. We apologize.'
                    ]);
        }
        return $result;
    }

    /**
     *
     */
    public function actionOffline(): void {
        echo 'system is not available';
    }
}
