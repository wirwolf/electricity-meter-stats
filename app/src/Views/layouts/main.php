<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 12.01.19
 * Time: 11:46
 */

\dmstr\web\AdminLteAsset::register($this);
\App\Assets\AdminLtePluginAsset::register($this);

use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */
\dmstr\web\AdminLteAsset::register($this);
\App\Assets\AdminLtePluginAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
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
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->beginBody() ?>

        <?= $this->render('mainParts/main-header', ['directoryAsset' => $directoryAsset]) ?>

        <?= $this->render('mainParts/main-sidebar', ['directoryAsset' => $directoryAsset]) ?>

        <?= $this->render('mainParts/content-wrapper', ['directoryAsset' => $directoryAsset, 'content' => $content]) ?>

        <?= $this->render('mainParts/main-footer', ['directoryAsset' => $directoryAsset]) ?>

        <?= $this->render('mainParts/control-sidebar', ['directoryAsset' => $directoryAsset]) ?>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>