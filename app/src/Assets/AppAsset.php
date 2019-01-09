<?php

namespace App\Assets;

use yii\web\AssetBundle;

/**
 * @author Andru Cherny
 * @date: 23.06.18 - 13:28
 */


class AppAsset extends AssetBundle
{

    public $css = [

    ];
    //Mainly scripts
    public $js = [




    ];
    public $depends = [
        \yii\web\YiiAsset::class,
    ];
}