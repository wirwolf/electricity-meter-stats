<?php
/**
 * @author Andru Cherny <acherny@minexsystems.com>
 * @date: 02.08.18 - 14:43
 */

use App\Helpers\Env;

if(YII_ENV_DEV) {
    return [
        'class'            => yii\swiftmailer\Mailer::class,
        'viewPath'         => '@App/Views',
        'htmlLayout'       => 'layouts/html.php',
        'textLayout'       => 'layouts/text.php',
    
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        //'useFileTransport' => true,
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => Env::get('APP_MAIL_DEBUG', true),
        'transport'        => [
            'class'      => Env::get('APP_MAIL_CLASS', Swift_SmtpTransport::class),
//            'host'       => Env::get('APP_MAIL_HOST', ''),
//            'username'   => Env::get('APP_MAIL_LOGIN', ''),
//            'password'   => Env::get('APP_MAIL_PASSWORD', ''),
//            'port'       => Env::get('APP_MAIL_PORT', '587'),
//            'encryption' => Env::get('APP_MAIL_ENCRYPTION', 'tls'),
        ],
    ];
} else {
    return [
        'class' => boundstate\mailgun\Mailer::class,
        'viewPath' => '@App/Views',
        'key' => Env::get('APP_MAILGUN_KEY', ''),
        'domain' => Env::get('APP_MAILGUN_DOMAIN', ''),
    ];
}