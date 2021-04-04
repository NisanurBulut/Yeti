<?php

namespace app\core\form;

use app\core\form;
use app\core\Model;


class DropdownField
{
    public Model $model;
    public string $attribute;
    public string $type;
    public array $items;
    public const TYPE_Dropdown = 'dropdown';
    public function __construct(Model $model, string $attribute, $items)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->items= $items;
    }
    public function __toString()
    {
        $itemTags='';
        foreach($this->items as $item)
        {
            $itemTags=$itemTags. ' ' .sprintf('<div class="item" data-value="%s">%s</div>',$item['id'],$item['name']);
        }
        return sprintf('<div class="ui fluid search selection %s">
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
