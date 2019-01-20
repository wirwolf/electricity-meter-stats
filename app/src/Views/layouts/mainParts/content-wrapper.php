<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 20.01.19
 * Time: 13:25
 */
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <?= \yii\widgets\Breadcrumbs::widget([]) ?>

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content"><?=$content?></section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->