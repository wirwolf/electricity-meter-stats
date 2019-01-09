<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 30.09.18
 * Time: 22:23
 */
/* @var $this \yii\web\View */
/* @var $content string */

use \yii\helpers\Html;
\App\Assets\AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <!--base(href="/")-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Title -->
    <title><?= Html::encode($this->title) ?> - <?= Html::encode(Yii::$app->name) ?></title>
    <!-- SEO Meta -->
    <!-- Favicon -->
    <link rel="icon" href="/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#d15c22">
    <meta name="msapplication-TileColor" content="#da532c">

    <!-- CSS -->
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="gray-bg">
<?php $this->beginBody() ?>
<!-- Preloader -->
<!-- Header -->

<!-- Main Section -->
<?php echo $content?>
<!-- Footer -->

<!-- Popup -->
<!-- JS -->
<!-- build:js js/all.min.js -->
<?php $this->endBody() ?>
<!-- endbuild -->
</body>
</html>
<?php $this->endPage() ?>





