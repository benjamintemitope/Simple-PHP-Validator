<?php 

//Include the Validator File
include 'validator.php';

//POST Fields
$_POST['username'] = "jo";
$_POST['email'] = "johndoe@example.";
$_POST['password'] = "pad";

//Fields required for validation.
$fields = ['username', 'email','password'];

//Rules for validation
$rules = [
    'username' => [
        'required', 'array', 'min' => 3
    ],
    'email' => [
        'required', 'email'
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
    'email' => [
        'required' => "Email is required.",
        'email' => "Provide a valid email address."
    ],
    'password' => [
        'required' => "Password is required.",
        'min' => "Password should be minimum of :min characters.",
        'max' => "Password should be maximum of :max characters."
    ]
];
print_r(validate($_POST, $fields, $rules, $messages));
