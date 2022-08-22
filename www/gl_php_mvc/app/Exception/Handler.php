<?php

namespace App\Exception;

use Analog\Analog;
use App\Config\Config;

class Handler
{
    /**
     * @param string $message
     * @param bool $critical
     * @return void
     */
    public static function showDefaultError(string $message = '', bool $critical = false)
    {
        Analog::error($message);

        if (Config::get('app.debug')) {
            echo $message;
        } else {
            echo 'Something went wrong';
        }

        if ($critical) {
            die();
        }
    }
}
