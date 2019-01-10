<?php
/**
 * @author Andru Cherny
 * @date: 23.06.18 - 13:27
 */

/* @var $this \yii\web\View */
/* @var $content string */

use App\Assets\AdminLtePluginAsset;
use yii\helpers\Html;
use App\Assets\AppAsset;
AppAsset::register($this);
AdminLtePluginAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - <?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render('header', ['directoryAsset' => $directoryAsset]) ?>

    <?= $this->render(
        'left',
        ['directoryAsset' => $directoryAsset]
    )
    ?>

    <?= $this->render(
        'content',
        ['content' => $content, 'directoryAsset' => $directoryAsset]
    ) ?>

</div>
<!-- Popup -->
<!-- JS -->
<!-- build:js js/all.min.js -->
<?php $this->endBody() ?>
<!-- endbuild -->
</body>
</html>
<?php $this->endPage() ?>

