<?php

namespace app\models;

use app\core\db\DbModel;

class StatusJoinColor extends DbModel
{
    public string $color = '';
    public string $name = '';
    public string $key = '0';
    public function tableName(): string
    {
        return '';
    }
    public function primaryKey(): string
    {
        return 'id';
    }
    public function select()
    {
        return parent::select();
    }
    public function selectFields($fields)
    {
        return parent::selectFields($fields);
    }
    public function save()
    {
        return parent::save();
    }
    public function update()
    {
        return parent::update();
    }
    public function where($where)
    {
        return parent::where($where);
    }
    public function delete($value)
    {
        return parent::delete($value);
    }
    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['key', 'color', 'name'];
    }
    public function labels(): array
    {
        return [
            'name' => 'Durum',
            'color' => 'Renk',
            'key'=>"key"
        ];
    }
}
