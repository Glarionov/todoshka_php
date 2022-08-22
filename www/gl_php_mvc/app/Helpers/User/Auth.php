<?php

namespace App\Helpers\User;

use App\Helpers\Session\SessionHelper;
use App\Models\AccessToken;

class Auth
{

    protected const AUTH_VARIABLES = [
        'isLogged',
        'user_id',
        'isAdmin',
        'login',
        'token',
    ];

    /**
     * Checks if current user is admin
     * @return mixed|null
     */
    public static function isAdmin()
    {
        return SessionHelper::get('isAdmin');
    }

    /**
     * Checks if session data matches actual access data
     * @param $token
     * @return bool
     */
    public static function confirmSessionData($token): bool
    {
        $filter = [
            ['user_id', SessionHelper::get('user_id')],
            ['token', SessionHelper::get('token')]
        ];

        $tokenData = AccessToken::query()->where($filter)->first();

        if (empty($tokenData)) {
            self::deleteAuthVariables();
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    public static function getAuthVariables()
    {
        $result = [];
        foreach (self::AUTH_VARIABLES as $variable) {
            $result[$variable] = SessionHelper::get($variable);
        }
        return $result;
    }

    public static function deleteAuthVariables()
    {
        SessionHelper::delete(self::AUTH_VARIABLES);
    }
}
