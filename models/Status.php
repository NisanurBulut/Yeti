<?php

namespace app\models;

use app\core\db\DbModel;
class Status extends DbModel
{
    public string $description = '';
    public string $name = '';
    public string $id='0';
    public string $color_id='0';
    public function tableName(): string
    {
        return 'tstatus';
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
        return [

        ];
    }
    public function primaryKey(): string
    {
        return 'id';
    }
    public function attributes(): array
    {
        return ['id', 'description', 'name', 'color_id'];
    }
    public function labels(): array
    {
        return ['name'=>'Durum',
                'description'=>'Tanım/Açıklama',
                'color_id'=>'Renk Id'];
    }
}
