<?php

namespace app\controllers;

use app\models\User;
use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\models\LoginForm;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->setLayout('auth');
    }
    public function login()
    {
        $loginForm = new LoginForm();
        return $this->render('auth/login', ["model" => $loginForm]);
    }
    private function validateForm(LoginForm $loginForm, Response $response)
    {
        $msg = $loginForm->convertErrorMessagesToString();
        Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
        return $response->redirect('login', ["model" => $loginForm]);
    }
    public function storeLogin(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if (!$loginForm->validate()  || !$loginForm->login()) {
                return $this->validateForm($loginForm,$response);
            }
            return $response->redirect('/dashboard');
        }
        return $response->redirect('/login', ["model" => $loginForm]);
    }
    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/auth/login');
    }
}
