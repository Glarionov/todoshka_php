<?php

namespace App\Config;

use App\Exception\Handler;
use App\Helpers\RenderHelpers\SmartyRenderHelper;

class Config
{

    const VARIABLES = [
        'app' => [
            'debug' => true
        ],
        'db' => [
            'default' => [
//                'user' => 'root',
//                'password' => 'tiger',
//                'database' => 'todo_list',
//                'host' => 'database',
                'user' => 'sql11514464',
                'password' => 'RGM55uGXgw',
                'database' => 'sql11514464',
                'host' => 'sql11.freemysqlhosting.net',
            ]
        ],
        'render' => [
            'engine' => 'smarty',
            'template_dir' => './gl_php_mvc/public/views',
            'engines' => [
                'smarty' => SmartyRenderHelper::class
            ]
        ]
    ];

    public static function get($params = '')
    {
        $paramsArray = explode('.', $params);
        $currentBranch = self::VARIABLES;
        $lastParamIndex = count($paramsArray) - 1;
        foreach ($paramsArray as $paramIndex => $param) {
            if (!isset($currentBranch[$param])) {
                Handler::showDefaultError("Can't find config variable '$params'");
                break;
            }
            if ($paramIndex == $lastParamIndex) {
                return $currentBranch[$param];
            }
            $currentBranch = $currentBranch[$param];
        }
    }

}