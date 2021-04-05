<?php

use app\core\Application;
use app\core\Model;
use app\models\User;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_UNIQUE, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    public function labels(): array
    {
        return  [
            'email'=>'Eposta Adresi',
            'password'=>"Parola"
        ];
    }
    public function login()
    {
        // need to find user
        $userEntity = new User();
        $user = $userEntity->where(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'Kullanıcı bulunamadı.');
            return false;
        }
        if (password_verify($this->password, $user->password)) {
            $this->addError('password', 'Kullanıcı parolası eşleştirilemedi.');
            return false;
        }

        Application::$app->login($user);
        return true;
    }
}
