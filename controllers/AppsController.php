<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\core\Application;

class AppsController extends Controller {

    public function index ()
    {
        return $this->render('apps/index');
    }
}
