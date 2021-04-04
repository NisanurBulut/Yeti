<?php

namespace app\controllers;

use app\models\Demand;
use app\core\Request;
use app\core\Controller;
use app\core\Application;

class  DemandsController extends Controller
{

    public function __construct()
    {
    }
    public function index()
    {
        $appList = new Demand();
        $result = $appList->select();
        $params = [
            'demands' => $result
        ];
        return $this->render('demands/index', $params);
    }
    public function deleteDemand(Request $request)
    {
        $appEntity = new Demand();
        if ($request->isDelete()) {
            $param = $request->params['id'];
            if ($appEntity->delete($param)) {
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla silindi');
                return Application::$app->response->redirect('/demands');
            }
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }
    public function storeDemand(Request $request)
    {
        $appModel = new Demand();
        if ($request->isPost()) {
            $appModel->loadData($request->getBody());
            if (!$appModel->validate()) {
                $msg = $appModel->convertErrorMessagesToString();
                Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
            }
            if ($appModel->save()) {
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla kaydedildi');
            }
            return Application::$app->response->redirect('/demands');
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }

    public function updateDemand(Request $request)
    {
        $appModel = new Demand();
        if ($request->isPost()) {
            $appModel->loadData($request->getBody());
            if (!$appModel->validate()) {
                $msg = $appModel->convertErrorMessagesToString();
                Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
            }

            if ($appModel->update()) {
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla güncellendi');
            }
            return Application::$app->response->redirect('/demands');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }
    public function editDemand(Request $request)
    {
        $appEntity = new Demand();

        if ($request->isGet()) {
            $param = $request->params['id'];
            $result = $appEntity->where(['id' => $param]);
            return $this->renderOnlyView('demands/forms/editDemand', ['model' => $result]);
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }
    public function createDemand()
    {
        $appModel = new Demand();
        return $this->renderOnlyView('demands/forms/createDemand', ['model' => $appModel]);
    }
}
