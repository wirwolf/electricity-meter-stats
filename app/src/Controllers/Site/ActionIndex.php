<?php
/**
 * @author Andru Cherny
 * @date: 14.02.18 - 15:58
 */


namespace App\Controllers\Site;

use App\Modules\Blockchain\Formatters\Factory\FormatterFactory;
use App\Modules\Integration\Components\IntegrationFactory;
use App\Modules\Integration\Modules\CoinMarketCap\Models\IntegrationCoinmarketcapStatistic;
use yii\base\Action;
use yii\helpers\Url;
use yii\redis\Cache;

class ActionIndex extends Action
{

    /**
     * @return string
     */
    public function run()
    {
        $this->controller->layout = 'landing';
        return $this->controller->render('index', [
        ]);
    }
}