<?php

namespace app\core\form;

use app\core\form;
use app\core\Model;


class DropdownField extends BaseField
{
    public Model $model;
    public string $attribute;
    public string $type;
    public array $items;
    public const TYPE_Dropdown = 'dropdown';
    public function __construct(Model $model, string $attribute, $items)
    {
        parent::__construct($model, $attribute);
        $this->items = $items;
    }
    public function renderInput(): string
    {
        $itemTags = '';
        foreach ($this->items as  $key => $value) {
            $itemTags = $itemTags . ' ' . sprintf(
                '
                <div class="item" data-value="%s">
            <a class="ui %s empty circular label"></a> %s
        </div>',
                $value->key,
                property_exists($value, 'color') ? $value->color : 'violet',
                $value->name
            );
        }
        return sprintf(
            '
        <div class="ui item selection search %s">
        <input type="hidden" name="%s">
        <i class="dropdown icon"></i>
        <div class="default text">%s</div>
        <div class="menu">
         %s
        </div>
      </div>',
            self::TYPE_Dropdown,
            $this->attribute,
            $this->model->getLabel($this->attribute),
            $itemTags
        );
    }
}
