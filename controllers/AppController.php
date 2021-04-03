<?php

namespace app\controllers;

use app\models\App;
use app\core\Request;
use app\core\Controller;
use app\core\Application;

class AppController extends Controller {

    public function __construct()
    {
        // Application::$app->session->setFlash('success','Merhaba');
    }
    public function index()
    {
        // todo listed apps from db
        $params = [
            'name' => "Selam Nisanur"
        ];
        return $this->render('apps/index', $params);
    }
    public function createApp()
    {
        return $this->render('apps/forms/create-app');
    }
    public function storeApp(Request $request)
    {

        $appModel = new App();
        $appModel->loadData($request->getBody());
        return $this->render('apps/index');
    }
}
