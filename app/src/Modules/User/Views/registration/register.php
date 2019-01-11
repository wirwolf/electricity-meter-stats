<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\Models\User $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')])  ?>

<div class="register-box">
    <div class="register-logo">
        <?= Html::encode($this->title) ?> <b>Admin</b>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
            'validateOnBlur' => false,
            'validateOnType' => false,
            'validateOnChange' => false,
            'fieldClass' => \App\Components\Forms\ActiveField::class
        ]) ?>

        <?= $form->field($model, 'username',
            [
                'template'=> "{input}\n{icon}\n{hint}\n{error}",
                'labelOptions' => [],
                'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1',  'placeholder' => 'Full name'],
                'options' => ['class' => 'form-group has-feedback'],
                'iconOption' => ['tag' => 'span', 'options' => ['class' => 'glyphicon glyphicon-user form-control-feedback']]
            ]
        );
        ?>
        <?= $form->field($model, 'email',
            [
                'template'=> "{input}\n{icon}\n{hint}\n{error}",
                'labelOptions' => [],
                'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1',  'placeholder' => 'Email'],
                'options' => ['class' => 'form-group has-feedback'],
                'iconOption' => ['tag' => 'span', 'options' => ['class' => 'glyphicon glyphicon-envelope form-control-feedback']]
            ]
        );
        ?>

        <?php if ($module->enableGeneratingPassword === false): ?>
            <?=
            $form->field($model, 'password',
                [
                    'template'=> "{input}\n{icon}\n{hint}\n{error}",
                    'labelOptions' => [],
                    'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1',  'placeholder' => 'Password'],
                    'options' => ['class' => 'form-group has-feedback'],
                    'iconOption' => ['tag' => 'span', 'options' => ['class' => 'glyphicon glyphicon-lock form-control-feedback']]
                ]
            )->passwordInput();

            $form->field($model, 'password',
                [
                    'template'=> "{input}\n{icon}\n{hint}\n{error}",
                    'labelOptions' => [],
                    'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1',  'placeholder' => 'Password again'],
                    'options' => ['class' => 'form-group has-feedback'],
                    'iconOption' => ['tag' => 'span', 'options' => ['class' => 'glyphicon glyphicon-log-in form-control-feedback']]
                ]
            )->passwordInput();


            ?>

        <?php endif ?>

            <div class="row">
                <!--div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div-->
                <!-- /.col -->
                <div class="col-xs-12">
                    <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                </div>
                <!-- /.col -->
            </div>
        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google(todo)</a>
        </div>
        <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
    </div>
    <!-- /.form-box -->
</div>