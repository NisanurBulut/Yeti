<?php

namespace app\core;

class Response
{

    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
    public function redirect(string $url)
    {
        $address = '/dashboard';
        if (Application::$app->isGuest() || Application::$app->isAdmin()) {
            $address = $url;
        }
        header('Location: ' . $address);
    }
}
