<?php 

//Include the Validator File
include 'validator.php';

//POST Fields
$_POST['username'] = "jo";
$_POST['password'] = "password";

//Fields required for validation.
$fields = ['username', 'password'];

//Rules for validation
$rules = [
    'username' => [
        'required', 'min' => 3
    ],
    'password' => [
        'required', 'min' => 5, 'max' => 15
    ]
];

//Custom Messages for Validation
$messages = [
    'username' => [
        'required' => "Username is required.",
        'min' => "Username should be minimum of :min characters."
    ],
    'password' => [
        'required' => "Password is required.",
        'min' => "Password should be minimum of :min characters.",
        'max' => "Password should be maximum of :max characters."
    ]
];
var_dump(validate($_POST, $fields, $rules, $messages));
