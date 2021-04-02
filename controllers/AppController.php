<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Controller;

class AppController extends Controller {

    public function __construct()
    {
        $this->setLayout('main');
        Application::$app->session->setFlash('success','Merhaba');
    }
    public function index()
    {
        $params = [
            'name' => "Selam Nisanur"
        ];
        return $this->render('apps/index', $params);
    }
    public function createApp()
    {
        return $this->render('apps/forms/create-app');
    }
}
