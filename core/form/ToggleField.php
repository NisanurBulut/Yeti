<?php

namespace app\core\form;

use app\core\form;
use app\core\Model;


class ToggleField
{
    public Model $model;
    public string $attribute;
    public string $type;
    public const TYPE_CHECKBOX = 'checkbox';
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    public function __toString()
    {
        return sprintf('
        <div class="field">
          <div class="ui toggle checkbox">
            <input
            type="%s"
            name="%s"
            %s
            tabindex="0"
            readonly="">
            <label  class="ui yellow" >%s</label>
          </div>
        </div>',
            self::TYPE_CHECKBOX,
            $this->attribute,
            $this->model->{$this->attribute} === true ? 'checked' : '',
            $this->model->getLabel($this->attribute)
        );
    }
}
