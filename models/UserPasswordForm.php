<?php

namespace app\models;

use app\core\BaseUserModel;
use app\core\db\DbModel;
use DateTime;

class UserPasswordForm extends BaseUserModel
{
    public string $id = '0';
    public string $password = '';
    public string $passwordConfirm = '';
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
            'password' => [],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ['password','passwordConfirm'];
    }
    public function labels(): array
    {
        return [
            'password' => "Yeni Parola",
            'passwordConfirm'=>'Parolayı Yeniden Yazın'
        ];
    }
}
