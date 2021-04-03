<?php

namespace app\controllers;

use app\models\App;
use app\core\Request;
use app\core\Controller;
use app\core\Application;

class AppsController extends Controller {

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

    public function storeApp(Request $request)
    {

        $appModel = new App();
        $appModel->loadData($request->getBody());
        Application::$app->session->setFlash('success','selam nisanur storeApp methoddan geliyorum');
        return Application::$app->response->redirect('/apps');
    }
}
