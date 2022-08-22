<?php

namespace App\Controllers;

use App\Exception\Handler;
use App\Helpers\Session\SessionHelper;
use App\Helpers\User\Auth;
use App\Models\AccessToken;
use App\Models\User;
use JetBrains\PhpStorm\NoReturn;

class AuthController extends AbstractController
{
    #[NoReturn] private function openDefaultPage()
    {
        header('Location:' .  '/tasks');
        die();
    }

    /**
     * @param $userId
     * @return mixed|string
     * @throws \Exception
     */
    protected function crateAccessToken($userId)
    {
        $tokenObject = new AccessToken();
        $tokenObject->user_id = $userId;
        $tokenObject->token = bin2hex(random_bytes(16));
        $tokenObject->save();
        return $tokenObject->token;
    }

    public function showLoginPage()
    {
        $errorMessage = '';

        $this->renderer->setVariables('is_logged', false);

        if (isset($_POST['login'])) {
            $user = User::query()->where([['login', $_POST['login']]])->first();
            if (password_verify($_POST['password'], $user->password)) {

                $authVariables = [
                    'isLogged' => true,
                    'user_id' => $user->id,
                    'isAdmin' => $user->is_admin,
                    'login' => $user->login,
                    'token' => $this->crateAccessToken($user->id)
                ];

                $this->renderer->setVariables($authVariables);

                SessionHelper::set($authVariables);

                $this->openDefaultPage();
            } else {
                $errorMessage = 'Wrong login or password';
            }
        }

        $this->renderer->setVariables(compact('errorMessage'));
        $this->renderer->display('auth/login');
    }

    public function logout()
    {
        $filter = [['token', $_GET['token']]];
        $token = AccessToken::query()->where($filter)->delete();

        if (empty($token)) {
            Handler::showDefaultError('Unable to delete access token', true);
        }

        Auth::deleteAuthVariables();

        $this->openDefaultPage();
    }

    public function register()
    {
        $user = new User();
        $user->fillAndSave([
            'login' => $_POST['login'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);
    }
}