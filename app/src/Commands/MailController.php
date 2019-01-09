<?php


declare(strict_types=1);

namespace App\Commands;

use App\Models\Clients;
use App\Modules\Database\Mysql\ClientsMails;
use yii\console\Controller;
use yii\db\conditions\InCondition;
use yii\db\Query;
use yii\helpers\Console;
use yii\helpers\Url;

/**
 * Class SiteController
 * @package App\Controllers
 */
class MailController extends Controller
{
    /**
     * @param int $limit
     */
    public function actionSend($limit = 100) {
        \Yii::info('Start mail sending', __METHOD__);
    }
}
