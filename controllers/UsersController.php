<?php

namespace app\controllers;

use app\models\User;
use app\core\Request;
use app\core\Controller;
use app\core\Application;

class UsersController extends Controller {
    public function __construct()
    {
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
    public function createUser()
    {
        $userEntity = new User();
        return $this->renderOnlyView('users/forms/createUser', ['model' => $userEntity]);
    }
    public function deleteUser(Request $request)
    {
        $userEntity = new User();
        if ($request->isDelete()) {
            $param = $request->params['id'];
            if ($userEntity->delete($param)) {
                Application::$app->session->setSuccessFlashMessage('Kullanıcı başarıyla silindi');
                return Application::$app->response->redirect('/users');
            }
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/users');
    }
    public function storeUser(Request $request)
    {
        $userEntity = new User();
        if ($request->isPost()) {
            $userEntity->loadData($request->getBody());
            if (!$userEntity->validate()) {
                $msg = $userEntity->convertErrorMessagesToString();
                Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
            }
            if ($userEntity->save()) {
                Application::$app->session->setSuccessFlashMessage('Kullanıcı başarıyla kaydedildi');
            }
            return Application::$app->response->redirect('/users');
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/users');
    }

    public function updateUser(Request $request)
    {
        $userEntity = new User();
        if ($request->isPost()) {
            $userEntity->loadData($request->getBody());
            if (!$userEntity->validate()) {
                $msg = $userEntity->convertErrorMessagesToString();
                Application::$app->session->setErrorFlashMessage('İşlem iptal edildi.' . $msg);
                return Application::$app->response->redirect('/users');
            }

            if ($userEntity->update()) {
                Application::$app->session->setSuccessFlashMessage('Kullanıcı başarıyla güncellendi');
                return Application::$app->response->redirect('/users');
            }
        }
        Application::$app->session->setErrorFlashMessage('Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/users');
    }
    public function editUser(Request $request)
    {
        $appEntity = new User();

        if ($request->isGet()) {
            $param = $request->params['id'];
            $result = $appEntity->where(['id' => $param]);
            return $this->renderOnlyView('users/forms/editUser', ['model' => $result]);
        }
        Application::$app->session->setFlash('error', 'Bir hata ile karşılaşıldı');
        return Application::$app->response->redirect('/users');
    }
 }