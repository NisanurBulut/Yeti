<?php

namespace app\controllers;

use app\models\User;
use app\core\Request;
use app\core\Controller;
use app\core\Application;

class UsersController extends Controller {
    public function __construct()
    {
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
    public function createApp()
    {
        $userModel = new User();
        return $this->renderOnlyView('users/forms/createUser', ['model' => $userModel]);
    }
 }