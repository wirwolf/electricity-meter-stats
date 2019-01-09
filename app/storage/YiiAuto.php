<?php
/**
 * @author Andru Cherny 'root'
 * Date: 22.08.17
 * Time: 15:26
 */
class Yii extends \yii\BaseYii
{

	/**
	 * @var \yii\console\Application|\yii\web\Application|AutoComplete
	 */
	public static $app;
}

/**
 * @property himiklab\yii2\recaptcha\ReCaptcha reCaptcha
 * @property \yii\redis\Connection redis
 * @property \mito\sentry\Component sentry
 */
class AutoComplete
{

}