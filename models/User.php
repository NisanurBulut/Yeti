<?php

namespace app\models;

use app\core\db\DbModel;
use DateTime;

class User extends DbModel
{
    public string $name_surname = '';
    public string $username = '';
    public string $email = '';
    public string $image_url = '';
    public bool $is_admin = false;
    public string $id = '0';
    public string $created_at = '';
    public string $password = '';
    public function __constructor()
    {
        $this->is_admin = false;
        $this->id = '0';
    }
    public function primaryKey(): string
    {
        return 'id';
    }
    public function tableName(): string
    {
        return 'tuser';
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
            'username' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            'name_surname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'image_url' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function attributes(): array
    {
        return ['name_surname', 'username', 'image_url', 'is_admin', 'email', 'id', 'created_at', 'password'];
    }
    public function labels(): array
    {
        return [
            'name_surname' => 'İsim Soyisim',
            'username' => 'Kullanıcı Adı',
            'image_url' => "Kullanıcı Fotoğrafı Http Adresi",
            'is_admin' => "Kullanıcı yönetici midir ?",
            'email' => "Eposta Adresi",
            'password' => "Parola"
        ];
    }
}
