<?php

namespace app\controllers;

use LoginForm;
use app\models\User;
use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\core\Application;

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
    public function storeLogin(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if (!$loginForm->validate()) {
                $msg = $loginForm->convertErrorMessagesToString();
                Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
            }
            if ($loginForm->login()) {
                return $response->redirect('/demands');
            }
        }
        return $this->render('auth/login', ["model" => $loginForm]);
    }
}
