<?php

namespace app\controllers;

use app\models\User;
use app\core\Request;
use app\core\Response;
use app\models\Demand;
use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AdminMiddleware;

class UsersController extends Controller {
    public function __construct()
    {
        $this->registerMiddleware(new AdminMiddleware(['index']));
        Application::$app->view->title='Kullanıcılar';
    }
    public function index()
    {
        $userlist = new User();
        $result = $userlist->select();
        $params = [
            'users' => $result
        ];
        return $this->render('users/index', $params);
    }
    private function validateForm(User $model, Response $response)
    {
        $msg = $model->convertErrorMessagesToString();
        Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
        return $response->redirect('/users');
    }
    public function createUser()
    {
        $userEntity = new User();
        return $this->renderOnlyView('users/forms/createUser', ['model' => $userEntity]);
    }
    public function DestroyUser(Request $request)
    {
        $userEntity = new User();
        $demandEntity = new Demand();

        if ($request->isDelete() && Application::$app->isAdmin()) {
            $param = $request->params['id'];
            $ownerUser = $demandEntity->where(["owner_id"],$param);
            $underTakingUser = $demandEntity->where(["undertaking_id"],$param);
            if($ownerUser || $underTakingUser){
                Application::$app->session->setErrorFlashMessage('Kullanıcıyla ilişkili talep bulunmuştır. İşlem iptal edilmiştir.');
                return Application::$app->response->redirect('/users');
            }

            if ($userEntity->delete($param)) {
                Application::$app->session->setSuccessFlashMessage('Kullanıcı başarıyla silindi');
                return Application::$app->response->redirect('/users');
            }
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/users');
    }
    public function storeUser(Request $request, Response $response)
    {
        $userEntity = new User();
        if ($request->isPost()) {
            $userEntity->loadData($request->getBody());
            $userEntity->password =  password_hash($userEntity->password, PASSWORD_DEFAULT);
            if (!$userEntity->validate() || !$userEntity->save()) {
                return $this->validateForm($userEntity, $response);
            }
            Application::$app->session->setSuccessFlashMessage('Kullanıcı başarılı şekilde kaydedildi.');
            return Application::$app->response->redirect('/users');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/users');
    }

    public function updateUser(Request $request, Response $response)
    {
        $userEntity = new User();
        if ($request->isPost()) {
            $userEntity->loadData($request->getBody());
            if (!$userEntity->validate() || !$userEntity->update()) {
                return $this->validateForm($userEntity, $response);
            }
            Application::$app->session->setSuccessFlashMessage('Kullanıcı başarılı şekilde güncellendi.');
            return Application::$app->response->redirect('/users');
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/users');
    }
    public function editUser(Request $request)
    {
        $userEntity = new User();

        if ($request->isGet()) {
            $param = $request->params['id'];
            $result = $userEntity->where(['id' => $param]);
            return $this->renderOnlyView('users/forms/editUser', ['model' => $result]);
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/users');
    }
 }