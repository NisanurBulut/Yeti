<?php

namespace app\controllers;

use app\models\App;
use app\core\Request;
use app\core\Response;
use app\models\Demand;
use app\core\Controller;
use app\core\Application;
use app\core\db\Constants;
use app\core\middlewares\AuthMiddleware;
use app\core\middlewares\AdminMiddleware;
use app\core\exceptions\ForbiddenException;

class  DemandsController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['index']));
        $this->registerMiddleware(new AdminMiddleware(['changeStateDemand']));
        Application::$app->view->title = 'Talepler';
    }
    private function validateModel(Demand $demanModel, Response $response)
    {
        $msg = $demanModel->convertErrorMessagesToString();
        Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
        return $response->redirect('/demands');
    }
    public function getDemands()
    {
        $query = Constants::spTdemandJoinWithtApp;
        $demandEntity = new Demand();
        if (!Application::$app->isAdmin()) {
            $paramid = Application::$app->user->id;
            $query = Constants::spTuserDemandJoinWithtApp;
            $demandList = $demandEntity->executeRawQueryWithParams($query, ["paramid" => $paramid]);
        } else {
            $demandList = $demandEntity->executeRawQuery($query);
        }
        return json_encode($demandList);
    }
    public function index()
    {
        return $this->render('demands/index');
    }

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
    public function storeDemand(Request $request, Response $response)
    {
        $demandEntity = new Demand();
        if ($request->isPost()) {
            $demandEntity->loadData($request->getBody());
            $demandEntity->owner_id = Application::$app->user->id;
            if (!$demandEntity->validate() || !$demandEntity->save()) {
                return $this->validateModel($demandEntity, $response);
            }
            Application::$app->session->setSuccessFlashMessage('Talep başarıyla kaydedildi. ');
            return Application::$app->response->redirect('/demands');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }

    public function updateDemand(Request $request, Response $response)
    {
        $demandEntity = new Demand();
        if ($request->isPost()) {
            $demandEntity->loadData($request->getBody());
            $demandEntity->owner_id = Application::$app->user->id;
            if (!$demandEntity->validate() || !$demandEntity->update()) {
                return $this->validateModel($demandEntity, $response);
            }
            Application::$app->session->setSuccessFlashMessage('Talep başarıyla güncellendi');
            return Application::$app->response->redirect('/demands');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }
    public function editDemand(Request $request)
    {
        $demandEntity = new Demand();

        if ($request->isGet()) {
            $appModel = new App();
            $param = $request->params['id'];
            $result = $demandEntity->where(['id' => $param]);
            $apps = $appModel->selectFields(['id AS "key"', 'app_name AS "name"']);
            return $this->renderOnlyView(
                'demands/forms/editDemand',
                ['model' => $result, 'apps' => $apps]
            );
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }
    public function showDemand(Request $request)
    {
        $demandEntity = new Demand();

        if ($request->isGet()) {
            $param = $request->params['id'];
            $result = $demandEntity->where(['id' => $param]);
            return $this->renderOnlyView('demands/forms/showDemand', ["model" => $result]);
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }
    public function changeStateDemand(Request $request)
    {
        $demandEntity = new Demand();
        $demandEntity->loadData($request->getBody());
        $demandItem = $demandEntity->where(["id" => $demandEntity->id]);
        $demandItem->undertaking_id = Application::$app->user->id;
        $result = $demandItem->updateWhere([
            "state" => $demandEntity->state,
            "undertaking_id" => $demandItem->undertaking_id
        ], [$demandEntity->primaryKey() => $demandEntity->id]);
        if ($result) {
            Application::$app->session->setSuccessFlashMessage('Talep aşaması başarıyla değiştirildi.');
            return Application::$app->response->redirect('/demands');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/demands');
    }
    public function createDemand()
    {
        $demandModel = new Demand();
        $appModel = new App();
        $apps = $appModel->selectFields(['id AS "key"', 'app_name AS "name"']);
        return $this->renderOnlyView('demands/forms/createDemand', ['model' => $demandModel, 'apps' => $apps]);
    }
}
