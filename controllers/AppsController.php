<?php

namespace app\controllers;

use app\models\App;
use app\core\Request;
use app\core\Controller;
use app\core\Application;

class AppsController extends Controller
{

    public function __construct()
    {
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
        if ($request->isDelete()) {
            $param = $request->params['id'];
            if ($appEntity->delete($param)) {
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla silindi');
                return Application::$app->response->redirect('/apps');
            }
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/apps');
    }
    public function storeApp(Request $request)
    {
        $appModel = new App();
        if ($request->isPost()) {
            $appModel->loadData($request->getBody());
            if (!$appModel->validate()) {
                $msg = $appModel->convertErrorMessagesToString();
                Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
            }
            if ($appModel->save()) {
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla kaydedildi');
            }
            return Application::$app->response->redirect('/apps');
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/apps');
    }

    public function updateApp(Request $request)
    {
        $appModel = new App();
        if ($request->isPost()) {
            $appModel->loadData($request->getBody());
            if (!$appModel->validate()) {
                $msg = $appModel->convertErrorMessagesToString();
                Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
            }

            if ($appModel->update()) {
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla güncellendi');
            }
            return Application::$app->response->redirect('/apps');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/apps');
    }
    public function editApp(Request $request)
    {
        $appEntity = new App();

        if ($request->isGet()) {
            $param = $request->params['id'];
            $result = $appEntity->where(['id' => $param]);
            return $this->renderOnlyView('apps/forms/editApp', ['model' => $result]);
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/apps');
    }
    public function createApp()
    {
        $appModel = new App();
        return $this->renderOnlyView('apps/forms/createApp', ['model' => $appModel]);
    }
}
