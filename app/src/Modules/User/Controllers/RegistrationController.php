<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 11.01.19
 * Time: 11:42
 */

namespace App\Modules\User\Controllers;


use yii\web\NotFoundHttpException;

class RegistrationController extends \SomeBlackMagic\Yii2User\Controllers\RegistrationController
{
    public $layout = 'login';


    /**
     * Confirms user's account. If confirmation was successful logs the user and shows success message. Otherwise
     * shows error message.
     *
     * @param int    $id
     * @param string $code
     *
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionConfirm($id, $code)
    {
        $user = $this->finder->findUserById($id);

        if ($user === null || $this->module->enableConfirmation == false) {
            throw new NotFoundHttpException();
        }

        $event = $this->getUserEvent($user);

        $this->trigger(self::EVENT_BEFORE_CONFIRM, $event);

        $status = $user->attemptConfirmation($code);

        $this->trigger(self::EVENT_AFTER_CONFIRM, $event);

        if($status === true ) {
            \Yii::$app->response->redirect('/main/index');
        } else {
            return $this->render('/message', [
                'title'  => \Yii::t('user', 'Account confirmation'),
                'module' => $this->module,
            ]);
        }
    }

}