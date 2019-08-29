<?php

return [
    'class' => 'yii\swiftmailer\Mailer',
    'useFileTransport' => false,
    'enableSwiftMailerLogging' => true,
    'transport' => [
        'class'=>'Swift_SmtpTransport',
        'host' => 'smtp.yandex.ru',
        'username' => 'geekbrains@onedeveloper.ru',
        'password' => '112358njkz_',
        'port' => '587',
        'encryption' => 'tls',
    ]
];