<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use SomeBlackMagic\Yii2User\Widgets\Connect;
use SomeBlackMagic\Yii2User\Models\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\Models\LoginForm $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')])  ?>


<div class="login-box">
    <div class="login-logo">
        <?= Html::encode($this->title) ?> <b>Admin</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
            'validateOnBlur' => false,
            'validateOnType' => false,
            'validateOnChange' => false,
            'fieldClass' => \App\Components\Forms\ActiveField::class
        ]) ?>
        <?php if ($module->debug): ?>
            <?= $form->field($model, 'login', [
                'inputOptions' => [
                    'autofocus' => 'autofocus',
                    'class' => 'form-control',
                    'tabindex' => '1']])->dropDownList(LoginForm::loginList());
            ?>

        <?php else: ?>

            <?= $form->field($model, 'login',
                [
                        'template'=> "{input}\n{icon}\n{hint}\n{error}",
                        'labelOptions' => [],
                        'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1',  'placeholder' => 'Email'],
                        'options' => ['class' => 'form-group has-feedback'],
                        'iconOption' => ['tag' => 'span', 'options' => ['class' => 'glyphicon glyphicon-envelope form-control-feedback']]
                ]
            );
            ?>

        <?php endif ?>


        <?php if ($module->debug): ?>
            <div class="alert alert-warning">
                <?= Yii::t('user', 'Password is not necessary because the module is in DEBUG mode.'); ?>
            </div>
        <?php else: ?>
            <?= $form->field($model, 'password',
                [
                    'template'=> "{input}\n{icon}\n{hint}\n{error}",
                    'inputOptions' => ['class' => 'form-control', 'tabindex' => '2'],
                    'options' => ['class' => 'form-group has-feedback'],
                    'iconOption' => ['tag' => 'span', 'options' => ['class' => 'glyphicon glyphicon-lock form-control-feedback']]
                ]
            )
                ->passwordInput()
                 ?>
        <?php endif ?>
            <div class="row">
                <div class="col-xs-8">
                    <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton(
                        Yii::t('user', 'Sign in'),
                        ['class' => 'btn btn-primary btn-block', 'tabindex' => '4']
                    ) ?>
                </div>
                <!-- /.col -->
            </div>
        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <?= Connect::widget([
                'baseAuthUrl' => ['/user/security/auth'],
            ]) ?>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google(todo)</a>
        </div>
        <!-- /.social-auth-links -->


        <?= Html::a(Yii::t('user', 'I forgot my password'), ['/user/recovery/request'], ['class'=>'text-center']) ?><br>
        <?php if ($module->enableRegistration): ?>
            <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register'], ['class'=>'text-center']) ?><br>
        <?php endif ?>
        <?php if ($module->enableConfirmation): ?>
            <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
        <?php endif ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
