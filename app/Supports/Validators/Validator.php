<?php

namespace Mojar\Supports\Validators;

class Validator
{

    public function sanitizeInput($data)
    {
        return sanitize_text_field($data);
    }

    public function sanitizeTextarea($data)
    {
        return sanitize_textarea_field($data);
    }

    public function validateEmail($data)
    {
        return is_email($data);
    }

    public static function validate($data, $rules)
    {
        $errors = [];
        foreach ($rules as $field => $rule) {
            $rules = explode('|', $rule);
            foreach ($rules as $rule) {
                $rule = explode(':', $rule);
                $ruleName = $rule[0];
                $ruleValue = isset($rule[1]) ? $rule[1] : null;
                $error = self::$ruleName($data, $field, $ruleValue);
                if ($error) {
                    $errors[$field] = $error;
                    break;
                }
            }
        }
        return $errors;
    }

    public static function required($data, $field, $ruleValue)
    {
        if (!isset($data[$field]) || empty($data[$field])) {
            return 'The ' . $field . ' field is required';
        }
    }

    public static function email($data, $field, $ruleValue)
    {
        if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
            return 'The ' . $field . ' field must be a valid email address';
        }
    }

    public static function min($data, $field, $ruleValue)
    {
        if (strlen($data[$field]) < $ruleValue) {
            return 'The ' . $field . ' field must be at least ' . $ruleValue . ' characters';
        }
    }

    public static function max($data, $field, $ruleValue)
    {
        if (strlen($data[$field]) > $ruleValue) {
            return 'The ' . $field . ' field may not be greater than ' . $ruleValue . ' characters';
        }
    }

    public static function unique($data, $field, $ruleValue)
    {
        global $wpdb;
        $table = $ruleValue;
        $value = $data[$field];
        $result = $wpdb->get_row("SELECT * FROM $table WHERE $field = '$value'");
        if ($result) {
            return 'The ' . $field . ' field must be unique';
        }
    }

    public static function exists($data, $field, $ruleValue)
    {
        global $wpdb;
        $table = $ruleValue;
        $value = $data[$field];
        $result = $wpdb->get_row("SELECT * FROM $table WHERE $field = '$value'");
        if (!$result) {
            return 'The ' . $field . ' field must be exists';
        }
    }
}