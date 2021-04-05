<?php

namespace app\controllers;

use app\models\App;
use app\core\Request;
use app\models\Demand;
use app\core\Controller;
use app\core\Application;
use app\core\db\Constants;
use app\models\DemandJoinModel;

class  DemandsController extends Controller
{

    public function __construct()
    {
        Application::$app->view->title='Talepler';
    }
    public function getDemands(){
        $query = Constants::tDemandJoinWithtApp;
        $demandJoinModel = new DemandJoinModel();
        $demandList=$demandJoinModel->executeRawQuery($query);
        return json_encode($demandList);
    }
    public function index()
    {
        return $this->render('demands/index');
    }
    // public function showDemand(Request $request)
    // {
    //     $demandEntity = new Demand();
    //     if ($request->isGet()) {
    //         $param = $request->params['id'];
    //         $demandItem = $demandEntity->where(["id"=>$param]);
    //         if($demandItem){
    //             return $this->renderOnlyView('demands/forms/createDemand', ['model' => $demandItem]);
    //         }
    //     }
    //     Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');

    //     return Application::$app->response->redirect('/demands');
    // }
    public function destroyDemand(Request $request)
    {
        $demandEntity = new Demand();
        if ($request->isDelete()) {
            $param = $request->params['id'];
            if ($demandEntity->delete($param)) {
                Application::$app->session->setSuccessFlashMessage('Talep başarıyla silindi');
                return Application::$app->response->redirect('/demands');
            }
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');

        return Application::$app->response->redirect('/demands');
    }
    public function storeDemand(Request $request)
    {
        $demanModel = new Demand();
        if ($request->isPost()) {
            $demanModel->loadData($request->getBody());
            if (!$demanModel->validate()) {
                $msg = $demanModel->convertErrorMessagesToString();
                Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
            }
            if ($demanModel->save()) {
                Application::$app->session->setSuccessFlashMessage('Talep başarıyla kaydedildi');
            }
            return Application::$app->response->redirect('/demands');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');

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
                Application::$app->session->setSuccessFlashMessage('Talep başarıyla güncellendi');
            }
            return Application::$app->response->redirect('/demands');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');

        return Application::$app->response->redirect('/demands');
    }
    public function editDemand(Request $request)
    {
        $demandEntity = new Demand();

        if ($request->isGet()) {
            $param = $request->params['id'];
            $result = $demandEntity->where(['id' => $param]);
            return $this->renderOnlyView('demands/forms/editDemand', ['model' => $result]);
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }
    public function createDemand()
    {
        $demandModel = new Demand();
        $appModel = new App();
        $apps = $appModel->selectFields(['id AS "key"','app_name AS "name"']);
        return $this->renderOnlyView('demands/forms/createDemand', ['model' => $demandModel, 'apps'=>$apps]);
    }
}