<?php

namespace app\controllers;

use app\core\Request;
use app\models\Demand;
use app\core\Controller;
use app\core\Application;

class HomeController extends Controller {

    public function home()
    {
        return $this->render('home');
    }
    public function contact()
    {
        $params = [
            'name' => "Selam Nisanur"
        ];
        return $this->render('contact', $params);
    }
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return 'handling submitted data';
    }
}
