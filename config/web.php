<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	'modules' => [
        'forum' => [
            'class' => 'app\modules\forum\Forum',
        ],
    ],
    'components' => [
	'imap' => [
        'class' => 'kekaadrenalin\imap\Imap',
        'connection' => [
            'imapPath'       => '{imappro.zoho.com:993/imap/ssl}INBOX',
            'imapLogin'      => 'saddam@softecventures.com',
            'imapPassword'   => 's@ddamhuss@1n',
            'serverEncoding' => 'encoding', // utf-8 default.
            'attachmentsDir' => '/',
            'decodeMimeStr'  => true, // Return as is, default -> true
        ],
    ],
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
		
		'i18n' => [
			'translations' => [
				'*' => [
					'class'          => 'yii\i18n\PhpMessageSource',
					'basePath'       => '@app/messages', // if advanced application, set @frontend/messages
					'sourceLanguage' => 'en',
					'fileMap'        => [
						//'main' => 'main.php',
					],
				],
			],
		],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'aLmXP5Q5lO108Yn3Hu9mDSrzTZMBqyx-',
        ],
		'util' => [
            'class' => 'app\components\LEComponent',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'mailer' => [
		'class' => 'yii\swiftmailer\Mailer',
		
			'useFileTransport'=>false,
         'transport' => [
				'class' => 'Swift_SmtpTransport',
				
				'host' => 'smtp.zoho.com',
				'username' => 'saddam@softecventures.com',
				'password' => 's@ddamhuss@1n',
				'port' => '587',
			'encryption' => 'TLS',
			'streamOptions' => [
            'ssl' => [
                'verify_peer' => false,
                'allow_self_signed' => true
            ],
        ],
			],
			],
        'reCaptcha' => [
			'name'    => 'reCaptcha',
			'class'   => 'himiklab\yii2\recaptcha\ReCaptcha',
			'siteKey' => '6Lc0kL0UAAAAAP8ZOZ6NdUYLOPGhcC-4qMRGfaPT',
			'secret'  => '6Lc0kL0UAAAAAENClcujplaEzqV7a0ciVE_g-3d5',
		],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
                'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
				
				'/site/activate/<key:.*>'=>'/site/activate',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				
                
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
