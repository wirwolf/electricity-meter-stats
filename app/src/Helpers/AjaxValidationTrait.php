<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 09.01.19
 * Time: 18:48
 */

namespace App\Helpers;

use Yii;
use yii\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;


trait AjaxValidationTrait
{
    /**
     * Performs ajax validation.
     *
     * @param Model $model
     *
     * @throws \yii\base\ExitException
     */
    protected function performAjaxValidation(Model $model)
    {
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data   = ActiveForm::validate($model);
            Yii::$app->response->send();
            Yii::$app->end();
        }
    }
}
