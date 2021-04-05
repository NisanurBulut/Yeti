<?php

namespace app\core;

abstract class Model
{
    public array $errors = [];
    public const RULE_REQUIRED = 'required';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_EMAIL = 'email';
    public const RULE_UNIQUE = 'unique';
    public bool $isUpdating;

    public function loadData($data)
    {
        $this->isUpdating = false;
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
                if ($key === 'id' && $this->{$key} > 0) {
                    $this->isUpdating = true;
                }
            }
        }
    }

    abstract public function rules(): array;
    public function labels(): array
    {
        return [];
    }
    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;
    }
    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;

                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addErrorForRule($attribute, self::RULE_REQUIRED, ['field' => $this->getLabel($attribute)]);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attribute, self::RULE_EMAIL, ['field' => $this->getLabel($attribute)]);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addErrorForRule($attribute, self::RULE_MIN, $rule,['field' => $this->getLabel($attribute)]);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrorForRule($attribute, self::RULE_MAX, $rule, ['field' => $this->getLabel($attribute)]);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $rule['match'] = $this->getLabel($rule['match']);
                    $this->addErrorForRule($attribute, self::RULE_MATCH, $rule, ['field' => $this->getLabel($attribute)]);
                }
                if ($ruleName === self::RULE_UNIQUE && $this->isUpdating == false) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $statement = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
                    $statement->bindValue(":attr", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if ($record) {
                        $this->addErrorForRule($attribute, self::RULE_UNIQUE, ['field' => $this->getLabel($attribute)]);
                    }
                }
            }
        }
        return empty($this->errors);
    }
    private function addErrorForRule(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }
    public function addError(string $attribute, string $message)
    {
        $this->errors[$attribute][] = $message;
    }
    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => '{field} alanı gereklidir. ',
            self::RULE_EMAIL => '{field} uyumlu bir adres olmalıdır. ',
            self::RULE_MATCH => '{match} alanının karşılığı bulunamadı. ',
            self::RULE_MIN => '{min} karakter sayısı sağlanmalıdır. ',
            self::RULE_MAX => 'Maksimum {max} karakter sayısı aşılmamalıdır. ',
            self::RULE_UNIQUE => '{field} alanı zaten kayıtlıdır. '
        ];
    }

    public function hasError($attribute)
    {
        $err = $this->errors[$attribute] ?? false;
        return $this->errors[$attribute] ?? false;
    }
    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
    public function convertErrorMessagesToString()
    {
        $str = '';
        $separator  = ', ';
        $errorMessages = array_values($this->errors);
        foreach ($errorMessages as $Array) {
            $str .= implode($separator, $Array);
        }
        return $str;
    }
}
