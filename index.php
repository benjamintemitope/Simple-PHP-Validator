<?php 

//Include the Validator File
include 'validator.php';

//POST Fields
$_POST['username'] = "j";
$_POST['email'] = "johndoe@example";
$_POST['password'] = "pass";
$_POST['remember_me'] = "";

//Fields required for validation.
$fields = ['username', 'email','password', 'remember_me'];

//Rules for validation
$rules = [
    'username' => [
        'required', 'min' => 3
    ],
    'email' => [
        'required', 'email'
    ],
    'password' => [
        'required', 'min' => 5, 'max' => 15
    ],
    'remember_me' => [
      'numeric', 'nullable'
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

$errors = validate($_POST, $fields, $rules, $messages);

if (!empty($errors)) {
    echo '<pre> '. print_r($errors, true ) .'</pre>';exit;
}

echo "No error found!.";