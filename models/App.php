<?php

namespace app\models;

use app\core\db\DbModel;
class App extends DbModel
{
    public string $app_name = '';
    public string $description = '';
    public string $db_name = '';
    public string $image_url = '';
    public string $access_url = '';
    public string $id;

    public function tableName(): string
    {
        return 'tapp';
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
            'app_name' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class'=>self::class]],
            'description' => [self::RULE_REQUIRED],
            'db_name' => [self::RULE_REQUIRED],
            'image_url' => [self::RULE_REQUIRED],
            'access_url' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return ['app_name', 'description', 'image_url', 'access_url', 'db_name','id'];
    }
    public function labels(): array
    {
        return ['app_name'=>'Uygulama Adı',
                'description'=>'Tanım/Açıklama',
                'image_url'=>'İkon Http Adresi',
                'access_url'=>'Erişim Bağlantı Linki',
                'db_name'=>'Veritabanı Adı'];
    }
}
