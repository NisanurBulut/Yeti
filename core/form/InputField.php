<?php

namespace app\core\form;

use app\core\form;
use app\core\Model;
use app\core\form\BaseField;

class InputField extends BaseField
{
    public Model $model;
    public string $attribute;
    public string $type;

    public const TYPE_PASSWORD = 'password';
    public const TYPE_TEXT = 'text';
    public const TYPE_NUMBER = 'number';
    public function __construct(Model $model, string $attribute, string $type)
    {
        parent::__construct($model, $attribute);
        $this->type = $type;
    }
    public function renderInput(): string
    {
        $te= $this->type;
        $te1= $this->attribute;
        $te2= $this->model->{$this->attribute};

        return sprintf(
            '<input id="inputFor" type="%s" name="%s" value="%s" class="ui input" ></input>',
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute}
        );
    }
}
