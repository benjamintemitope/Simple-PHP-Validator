# Simple Validator
Use for PHP Validation

# Description
```php
validate(array $_POST, array $fields, array $rules [,array $messages]) :array
```
Validate Data

# Parameters
<ul>
    <li><code>$_POST</code> Form Data</li>
    <li><code>$fields</code> Validation Fields</li>
    <li><code>$rules</code> Validation Rules</li>
    <li><code>$messages</code> <i>(optional)</i> Validation Messages</li>
</ul>

# Return Values
Return <code>NULL</code> if no validation error

# Usage

Include the Validator File
```php
include 'validator.php';
```

Fields required for validation. e.g
```php 
$fields = ['username', 'password'];
```

Rules for validation
```php
$rules = [
    'username' => ['required', 'min' => 3],
    'password' => ['required', 'min' => 5]
];
```

Custom Messages for Validation
```php 
$messages = [
    'username' => [
        'required' => "Username is required.",
        'min' => "Username should be minimum of 3 characters."
    ],
    'password' => [
        'required' => "Password is required.",
        'email' => "Password must be a valid Email Address."
    ]
];
```


# Example
```bash
$ php -S localhost:8000
```
Now you can visit [http://localhost:8000/](http://localhost:8000/) in your browser to view the output of this example.

