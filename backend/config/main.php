<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'role' => [
          'class' => 'backend\modules\role\Module',
        ],
        'permission' => [
            'class' => 'backend\modules\permission\Module',
        ],
        'employee' => [
            'class' => 'backend\modules\employee\Module',
        ],
        'assets' => [
            'class' => 'backend\modules\assets\Module',
        ],
        'tasks' => [
            'class' => 'backend\modules\tasks\Module',
        ],
         'tasktype' => [
            'class' => 'backend\modules\tasktype\Module',
        ],
         'department' => [
            'class' => 'backend\modules\department\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@theme/backend'
             ],
         ],
    ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
