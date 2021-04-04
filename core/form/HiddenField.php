<?php

namespace app\core\form;

use app\core\form;
use app\core\Model;
use app\core\form\BaseField;

class HiddenField
{
    public Model $model;
    public string $attribute;
    public string $type;
    public const TYPE_HIDDEN = 'hidden';
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    public function __toString()
    {
        return sprintf(
            '<input type="%s" name="%s" value="%s"></input>',
            self::TYPE_HIDDEN,
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }
}
