<?php
$params = array_merge(
    require __DIR__ . '/params.php'
);
Yii::setAlias('@runtime', dirname(dirname(__DIR__)).'/runtime');
return [
    'id' => 'micro-app',
    // the basePath of the application will be the `micro-app` directory
    'basePath' => dirname(__DIR__),
    // this is where the application will find all controllers
    'controllerNamespace' => 'micro\controllers',
    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@micro' => dirname(__DIR__),
    ],
    'params'=>$params,
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7RqMTwS8PfIv3vJ2Q2gI6Iz86dFktJLA',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'urlManager'=>[
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                "<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>"=>"<module>/<controller>/<action>",
                "<controller:\w+>/<action:\w+>/<id:\d+>"=>"<controller>/<action>",
                "<controller:\w+>/<action:\w+>"=>"<controller>/<action>",
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','info'],
                    'logVars' =>['_GET', '_POST'],
                    'logFile'=>'@runtime/logs/ceshi-'.date('Y-m-d').'.log',
                ],
            ],
        ],

    ],
];