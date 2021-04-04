<?php

namespace app\core\form;

use app\core\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form class="ui form" autocomplete="off" action="%s" method="%s">', $action, $method);
        return new Form();
    }
    public static function end()
    {
        return '</form';
    }
    public function field(Model $model, $attribute, $type, $actions)
    {
        return new InputField($model, $attribute, $type, $actions);
    }
}
