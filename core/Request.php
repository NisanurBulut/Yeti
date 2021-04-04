<?php


namespace app\core;


class Request
{
    public $params;
    public $contentType;
    public $reqMethod;
    public function __contructor($params = [])
    {
        $this->params = $params;
        $this->reqMethod = trim($_SERVER['REQUEST_METHOD']);
        $this->contentType = !empty($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';;
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        $totalLenght=strlen($path);
        $count=$totalLenght-4-$position;
        $this->params['id']=substr($path, ($position+4),$count);
        $path = substr($path, 0, $position);
        return $path;
    }
    public function getBody()
    {
        $body = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }
    public function isDelete()
    {
        return $this->method() === 'post';
    }
}
