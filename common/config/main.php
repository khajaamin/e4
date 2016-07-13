<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.eventforall.com',//'sg2plcpnl0011.prod.sin2.secureserver.net',
                'username' => 'info@eventforall.com',
                'password' => 'admin@123',
                'port' => '25', // 465
                'encryption' => 'tls',
            ],
        ],
    ],
];
