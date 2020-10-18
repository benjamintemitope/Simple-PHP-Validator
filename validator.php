<?php

$errors = [];

    function validate(array $data, array $fields, array $rules, array $messages = [])
    {
        foreach ($fields as $field) {
            if (!array_key_exists($field, $data)) {
                http_response_code(422);
                die($field . ' is not present in data.');
                exit;
            }
        }

        foreach ($data as $field => $field_value) {

            if (key_exists($field, $rules)) {
                
                foreach ($rules[$field] as $rule => $rule_value) {
                    $field_value = trim($field_value);

                    if (is_int($rule)) {
                        $rule = $rule_value;
                    }

                    // If Custom Message exist for validation
                    if (key_exists($field, $messages) && key_exists($rule, $messages[$field])) {
                        foreach ($messages[$field] as $message => $message_value){
                            $message_value = trim($message_value);
                            switch ($rule) {
                                case 'required':
                                    if (empty($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }
                                break;

                                case 'email':
                                    if (!filter_var($field_value, FILTER_VALIDATE_EMAIL)){
                                        addError($field, $messages[$field][$rule]);
                                    }
                                break;

                                case 'min':
                                    if (strlen($field_value) < $rule_value) {
                                        $message = str_replace(':min', $rule_value, $messages[$field][$rule]);
                                        addError($field, $message);
                                        
                                    }
                                break;

                                case 'max':
                                    if (strlen($field_value) > $rule_value) {
                                        $message = str_replace(':max', $rule_value, $messages[$field][$rule]);
                                        addError($field, $message);
                                    }
                                break;

                                case 'alpha':
                                    if (!ctype_alpha($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }
                                break;

                                case 'alphanumeric':
                                    if (!ctype_alnum($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }
                                break;

                                case 'array':
                                    if (!is_array($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }
                                break;

                                case 'string':
                                    if (!is_string($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }
                                break;

                                case 'num':
                                    if (!ctype_digit ($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }
                                break;

                                case 'lower':
                                    if (!ctype_lower($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }    
                                break;

                                case 'upper':
                                    if (!ctype_upper($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }    
                                break;

                                case 'hexadec':
                                    if (!ctype_xdigit($field_value)) {
                                        addError($field, $messages[$field][$rule]);
                                    }    
                                break;
                            }
                        }       
                    }else {
                        switch ($rule) {
                            case 'required':
                                if (empty($field_value)) {
                                    addError($field, ucwords($field). ' is required');
                                }
                            break;

                            case 'email':
                                if (!filter_var($field_value, FILTER_VALIDATE_EMAIL)){
                                    addError($field, ucwords($field). ' must be a valid email. ');
                                }
                            break;

                            case 'min':
                                if (strlen($field_value) < $rule_value) {
                                    addError($field, ucwords($field). ' should be minimum of '.$rule_value. ' characters');
                                }
                            break;

                            case 'max':
                                if (strlen($field_value) > $rule_value) {
                                    addError($field, ucwords($field). ' should be maximum of '.$rule_value. ' characters');
                                }
                            break;

                            case 'alpha':
                                if (!ctype_alpha($field_value)) {
                                    addError($field, ucwords($field). ' should be alphabetic characters');
                                }
                            break;
                            
                            case 'alphanumeric':
                                if (!ctype_alnum($field_value)) {
                                    addError($field, ucwords($field). ' should be alphanumeric characters');
                                }
                            break;

                            case 'array':
                                if (!is_array($field_value)) {
                                    addError($field, ucwords($field). ' should be an array.');
                                }
                            break;

                            case 'string':
                                if (!is_string($field_value)) {
                                    addError($field, ucwords($field). ' must be a string. ');
                                }
                            break;

                            case 'num':
                                if (!ctype_digit($field_value)) {
                                    addError($field, ucwords($field). ' must be a numeric character. ');
                                }
                            break;

                            case 'lower':
                                    if (!ctype_lower($field_value)) {
                                        addError($field, ucwords($field). ' must be in lowercase characters. ');
                                    }    
                            break;

                            case 'upper':
                                if (!ctype_upper($field_value)) {
                                    addError($field, ucwords($field). ' must be in uppercase characters. ');
                                }    
                            break;

                            case 'hexadec':
                                if (!ctype_xdigit($field_value)) {
                                    addError($field, ucwords($field). ' must be in hexadecimal digits. ');
                                }    
                            break;
                            
                        }
                    }
                }
            }
        }

        global $errors;
        if (!empty($errors)) {
            http_response_code(422);
        }
        return $errors;
    }

    function addError($field, $error)
    {
        global $errors;
        $errors[$field] = $error;
    }
