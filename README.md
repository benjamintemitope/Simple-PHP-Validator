# Simple Validator File
Use for PHP Validation

## Description
```php
validate(array $_POST, array $fields, array $rules [,array $messages]) :array|bool
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
```php
array
```

## Example
```php
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
```

## Run Server
```bash
php -S localhost:8000
```
Now you can visit [http://localhost:8000/](http://localhost:8000/) in your browser to view the output of this example.

# Rules Available
<table>
    <tr>
        <th>Rule</th>
        <th>Usage</th>
    </tr>
    <tbody>
        <tr>
            <td>Required</td>
            <td><code>required</code></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><code>email</code></td>
        </tr>
        <tr>
            <td>Minimum</td>
            <td><code>min => <i>value</i></code></td>
        </tr>
        <tr>
            <td>Maximum</td>
            <td><code>max => <i>value</i></code></td>
        </tr>
        <tr>
            <td>Alphabetic</td>
            <td><code>alpha</code></td>
        </tr>
        <tr>
            <td>Alphanumeric</td>
            <td><code>alphanumeric</code></td>
        </tr>
        <tr>
            <td>Array</td>
            <td><code>array</code></td>
        </tr>
        <tr>
            <td>String</td>
            <td><code>string</code></td>
        </tr>
        <tr>
            <td>Numeric</td>
            <td><code>numeric</code></td>
        </tr>
        <tr>
            <td>Lowercase</td>
            <td><code>lower</code></td>
        </tr>
        <tr>
            <td>Uppercase</td>
            <td><code>upper</code></td>
        </tr>
        <tr>
            <td>Hexadecimal</td>
            <td><code>hexadec</code></td>
        </tr>
        <tr>
            <td>Nullable</td>
            <td><code>nullable</code></td>
        </tr>
    </tbody>
</table>

> When using the `nullable` rule, let it be the last rule assigned to the field.