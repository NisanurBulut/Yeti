<?php

namespace app\models;

use app\core\Application;
use app\core\db\DbModel;

class Demand extends DbModel
{
    public string $title = '';
    public string $description = '';
    public string $state = 'Bekliyor';
    public string $status_id = '';
    public string $app_id = '';
    public string $id = '';
    public string $undertaking_id = '';
    public string $owner_id = '';

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
    public function countWhere($where)
    {
        return parent::countWhere($where);
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
            'undertaking_id' => [],
            'app_id' => [self::RULE_REQUIRED],
            'status_id' => [self::RULE_REQUIRED],
            'state' => [self::RULE_REQUIRED]
        ];
    }
    public function hasRelation($where): bool
    {
        $relation = $this->isExist($where, $this->tableName());
        if ($relation) {
            Application::$app->session->setErrorFlashMessage('Kayıtla lişkili talep bulunmuştur. İşlem iptal edilmiştir.');
        }
        return $relation;
    }
    public function attributes(): array
    {
        return ['title', 'description', 'owner_id', 'undertaking_id', 'app_id', 'id', 'state', 'status_id'];
    }
    public function primaryKey(): string
    {
        return 'id';
    }
    public function labels(): array
    {
        return [
            'title' => 'Konu',
            'description' => 'Açıklama',
            'owner_id' => "Talebi Açan Kullanıcı",
            'undertaking_id' => "Talebi üstlenen Kullanıcı",
            'app_id' => "Uygulama",
            'state' => "Aşama",
            'status_id' => "Durum",
        ];
    }
}
