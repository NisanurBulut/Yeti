<?php

namespace app\models;

use app\core\BaseUserModel;
use app\core\db\DbModel;
use DateTime;

class User extends BaseUserModel
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
    public function getUserImageUrl(): string
    {
        return $this->image_url;
    }
    public function getDisplayName(): string
    {
        return $this->username;
    }
    public function isAdmin(): bool
    {
        return $this->is_admin;
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
        if (!isset($_POST['is_admin'])) // PHP doesnt see checkbox's value
            {
                $_POST['is_admin'] = false;
            }
        if (($key = array_search('password', $this->attributes())) !== false) {
            unset($this->attributes()[$key]);
        }
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
            'password' => []
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
