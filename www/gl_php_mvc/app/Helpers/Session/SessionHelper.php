<?php

namespace App\Helpers\Session;

class SessionHelper
{
    /**
     * @param $params
     * @param $value
     * @return void
     */
    public static function set($params, $value = null)
    {
        if (!is_array($params)) {
            $params = [$params];
        }

        foreach ($params as $param => $value) {
            $_SESSION[$param] = $value;
        }
    }

    /**
     * @param $param
     * @return mixed|null
     */
    public static function get($param)
    {
        return $_SESSION[$param] ?? null;
    }

    public static function delete($params)
    {
        if (!is_array($params)) {
            $params = [$params];
        }
        foreach ($params as $param) {
            if (isset($_SESSION[$param])) {
                unset($_SESSION[$param]);
            }
        }
    }
}