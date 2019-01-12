<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 12.01.19
 * Time: 11:44
 */

namespace App\Controllers\Main;


use yii\base\Action;

class IndexAction extends Action
{
    public function run() {
        return $this->controller->render('index', [
        ]);
    }
}