<?php

namespace app\core;

use app\helpers\Helper;

class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';

    const ERROR_MESSAGES = [
        self::RULE_REQUIRED => "is required",
        self::RULE_EMAIL => "contains invalid email address",
    ];

    public array $errors = [];


    public function validate()
    {

        foreach($this->rules() as $key => $rules){
            $value = $this->{$key};
            foreach($rules as $rule){
                $ruleName = is_array($rule) ? $rule[0] : $rule;
                if($ruleName === self::RULE_REQUIRED && strlen($value) === 0){
                    $this->addErrorForRule($key, self::RULE_REQUIRED);
                }
                if($ruleName === self::RULE_EMAIL && !Helper::emailIsValid($value))
                {
                    $this->addErrorForRule($key, self::RULE_EMAIL);
                }
            }

        }

        return empty($this->errors);
    }


    private function addErrorForRule(string $key, string $erroredRule)
    {
        $this->errors[] = "Field $key: " . self::ERROR_MESSAGES[$erroredRule];
    }

    public function getErrors()
    {
        return implode(' | ', $this->errors);
    }
}