<?php

namespace app\controllers;

use app\models\App;
use app\core\Request;
use app\models\Demand;
use app\core\Controller;
use app\core\Application;
use app\models\DemandJoinModel;

class  DemandsController extends Controller
{

    public function __construct()
    {
        Application::$app->view->title='Talepler';
    }
    public function getDemands(){
        $query = 'SELECT td.id, td.title, td.description, td.state, td.status,
        tp.app_name AS "appName", tu1.username AS "ownerUsername",
        tu2.username AS "takedUsername", tu1.name_surname AS "ownerNamesurname",
        tu2.name_surname AS "takedNamesurname",
        TIMESTAMPDIFF(HOUR, td.created_at, NOW())
           as "differenceTime"
        FROM tdemand td left join tapp AS tp on tp.id=td.app_id
        left join tuser AS tu1 on tu1.id=td.owner_id left join tuser
        AS tu2 on tu2.id=td.undertaking_id';
        $demandJoinModel = new DemandJoinModel();
        $demandList=$demandJoinModel->runCustomExecute($query);

        return json_encode($demandList);
    }
    public function index()
    {
        return $this->render('demands/index');
    }
    public function destroyDemand(Request $request)
    {
        $appEntity = new Demand();
        if ($request->isDelete()) {
            $param = $request->params['id'];
            if ($appEntity->delete($param)) {
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla silindi');
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
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla güncellendi');
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