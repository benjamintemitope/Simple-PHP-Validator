# Simple Validator File
Use for PHP Validation

## Description
```php
validate(array $_POST, array $fields, array $rules [,array $messages]) :array
```
Validate Data

## Parameters
<ul>
    <li><code>$_POST</code> Form Data</li>
    <li><code>$fields</code> Validation Fields</li>
    <li><code>$rules</code> Validation Rules</li>
    <li><code>$messages</code> <i>(optional)</i> Validation Messages</li>
</ul>

## Return Values
Return Array

## Example
```php
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
```

```bash
$ php -S localhost:8000
```
Now you can visit [http://localhost:8000/](http://localhost:8000/) in your browser to view the output of this example.

# Rules Available
<ul id="rules">
    <li>Required</li>
    <li>Email</li>
    <li>Min</li>
    <li>Max</li>
    <li>Alpha</li>
    <li>Alphanumeric</li>
    <li>Array</li>
    <li>String</li>
    <li>Numeric</li>
</ul>
