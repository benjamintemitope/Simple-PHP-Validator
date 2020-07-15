<?php 

// Include Validator File
include 'validator.php';

//fields required for the submission
$fields = ['username', 'password'];

//rules for the validation
$rules = [
    'username' => ['required', 'min' => 3],
    'password' => ['required', 'min' => 5]
];

//POST Fields
$_POST['username'] = "johndoe";
$_POST['password'] = "password";

//Custom message for validation
$messages = [
    'username' => [
        'required' => "Username is required.",
        'min' => "Username should be minimum of :min characters."
    ],
    'password' => [
        'required' => "Password is required.",
        'min' => "Password should be minimum of :max characters."
    ]
];

var_dump(validate($_POST, $fields, $rules, $messages)); //NULL
