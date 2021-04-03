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
        $appList = new App();
        $result = $appList->select();
        $params = [
            'apps' => $result
        ];
        return $this->render('apps/index', $params);
    }
    public function deleteApp(Request $request)
    {
        $appEntity = new App();
        if($request->isDelete())
        {
            $result = $appEntity->delete($request['id']);
            Application::$app->session->setFlash('success','Uygulama başarıyla silindi');
        }
        Application::$app->session->setFlash('error','Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/apps');
    }
    public function storeApp(Request $request)
    {
        $appModel = new App();
        if($request->isPost())
        {
            $appModel->loadData($request->getBody());

            if($appModel->validate() && $appModel->save()){
                Application::$app->session->setFlash('success','Uygulama başarıyla kaydedildi');
            }
        }
        Application::$app->session->setFlash('error','Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/apps');
    }
}
