<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: miroslav
 * Date: 25.09.17
 * Time: 12:44
 */

namespace App\Components;

use Mailgun\Mailgun;
use yii\base\Component;
use yii\helpers\Json;

/**
 * Class MailgunClient
 * @package App\Components
 */
class MailgunClient extends Component
{
    
    /**
     * @var string
     */
    public $apiKey;
    
    /**
     * @var string
     */
    public $domain;
    
    /**
     * @var Mailgun
     */
    private $client;
    
    public $debug;

    /**
     *
     */
    public function init(): void
    {
        $this->client = Mailgun::create($this->apiKey);
    }
    
    /**
     * @param $params
     * @return bool
     */
    public function send($params): bool
    {
        \Yii::info('Send mail.', __CLASS__);
        if($this->debug) {
            \Yii::info('Debug: Send mail.'.Json::encode($params));
            return true;
        }
        try {
            $result = $this->client->messages()->send($this->domain, $params);
            \Yii::info('Result:' . Json::encode([$result->getId(),$result->getMessage()]), __CLASS__);
            return true;
        } catch (\Exception $e) {
            \Yii::warning([
                'msg' => 'Can not send mail to subscriber',
                'extra' => Json::encode($params),
                'tags' => (array)$e
            ], __CLASS__);
            return false;
        }
    }
}