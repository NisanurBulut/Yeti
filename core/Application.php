<?php

namespace app\core;

use app\core\View;
use app\core\Session;
use app\core\Controller;
use app\core\db\Database;
use app\models\User;

class Application
{
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public static Application $app;
    public ?Controller $controller = null;
    public View $view;
    public ?User $user = null; // User can be null
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->controller = new Controller();
        $this->view = new View();
        $this->db = new Database($config['db']);
        $this->user = new User();
        $primaryValue = self::$app->session->get('user');
        $primaryKey = $this->user->primaryKey();
        if ($primaryValue) {
            $this->user = $this->user->where([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }
    public function getController()
    {
        return $this->controller;
    }
    public function setController($controller)
    {
        $this->controller->$controller;
    }
    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }
    public function login(User $user)
    {
        // we need to read user from session
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};

        $this->session->set('user', $primaryValue);
    }
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
    public static function isGuest()
    {
        return self::$app->user;
    }
    public static function isAdmin()
    {
        return self::$app->user->is_admin;
    }
}
