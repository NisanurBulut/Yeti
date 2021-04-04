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
    public string $classStyle = '';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_TEXT = 'text';
    public const TYPE_NUMBER = 'number';
    public function __construct(Model $model, string $attribute, string $type, string $classStyle)
    {
        parent::__construct($model, $attribute);
        $this->type = $type;
        $this->classStyle = $classStyle;
    }
    public function renderInput(): string
    {
        return sprintf(
            '<input type="%s" name="%s" id="%s" value="%s" placeholder="%s" class="ui input %s"></input>',
            $this->type,
            $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->getLabel($this->attribute),
            $this->classStyle
        );
    }
}
