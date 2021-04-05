<?php

use app\core\Model;

class LoginForm extends Model
{
    public string $email;
    public string $password;

    public function rules():array{
        return [
            'email'=>[self::RULE_UNIQUE, self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED]
        ];
    }
}