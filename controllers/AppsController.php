<?php

namespace app\controllers;

use app\models\App;
use app\core\Request;
use app\core\Response;
use app\models\Demand;
use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\middlewares\AdminMiddleware;
use app\core\exceptions\ForbiddenException;

class AppsController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AdminMiddleware([
            'index', 'DestroyApp','storeApp','updateApp','editApp','createApp']));
            $this->registerMiddleware(new AuthMiddleware(['index']));
            Application::$app->view->title='Uygulamalar';
    }
    private function validateForm(App $model, Response $response)
    {
        $msg = $model->convertErrorMessagesToString();
        Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
        return $response->redirect('/apps');
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

    public function DestroyApp(Request $request)
    {
        $appEntity = new App();
        if ($request->isDelete()) {
            $param = $request->params['id'];
            $demandEntity = new Demand();
            if($demandEntity->hasRelation(["app_id" => $param],$param)){
                return Application::$app->response->redirect('/apps');
            }
            if ($appEntity->delete($param)) {
                Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla silindi');
                return Application::$app->response->redirect('/apps');
            }
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/apps');
    }
    public function storeApp(Request $request, Response $response)
    {
        $appModel = new App();
        if ($request->isPost()) {
            $appModel->loadData($request->getBody());
            if (!$appModel->validate() || !$appModel->save()) {
                return $this->validateForm($appModel, $response);
            }
            Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla kaydedildi');
            return Application::$app->response->redirect('/apps');
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/apps');
    }

    public function updateApp(Request $request, Response $response)
    {
        $appModel = new App();
        if ($request->isPost()) {
            $appModel->loadData($request->getBody());
            if (!$appModel->validate() || !$appModel->update()) {
                return $this->validateForm($appModel, $response);
            }
            Application::$app->session->setSuccessFlashMessage('Uygulama başarıyla güncellendi');
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