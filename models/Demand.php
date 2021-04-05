<?php

namespace app\models;

use app\core\db\DbModel;

class Demand extends DbModel
{
    public string $title = '';
    public string $description = '';
    public string $state_id = '0';
    public string $status_id = '0';
    public string $app_id = '0';
    public string $id = '0';
    public string $undertaking_id='0';
    public string $owner_id='0';

    public function __constructor()
    {
    }
    public function tableName(): string
    {
        return 'tdemand';
    }
    public function select()
    {
        return parent::select();
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
            'title' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'owner_id' => [self::RULE_REQUIRED],
            'undertaking_id' => [self::RULE_REQUIRED],
            'app_id' => [self::RULE_REQUIRED],
            'status_id' => [self::RULE_REQUIRED],
            'state_id' => [self::RULE_REQUIRED]
        ];
    }

    public function attributes(): array
    {
        return ['title', 'description', 'owner_id', 'undertaking_id', 'app_id', 'id','state_id','status_id'];
    }
    public function labels(): array
    {
        return [
            'title' => 'Konu',
            'description' => 'Açıklama',
            'owner_id' => "Talebi Açan Kullanıcı",
            'undertaking_id' => "Kullanıcı üstlenen Kullanıcı",
            'app_id' => "Uygulama",
            'state_id' => "Aşama",
            'status_id' => "Durum",
        ];
    }
}
