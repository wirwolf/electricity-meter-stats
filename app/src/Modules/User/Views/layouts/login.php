<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 09.01.19
 * Time: 17:51
 */

use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */
\dmstr\web\AdminLteAsset::register($this);
\App\Assets\AdminLtePluginAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= Html::encode($this->title) ?> - <?= Html::encode(Yii::$app->name) ?></title>
        <?php $this->registerCsrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body class="login-page">

    <?php $this->beginBody() ?>

    <?= $content ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>