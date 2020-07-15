# Simple Validator
Use for PHP Validation

# Description
```php
validate(array $_POST, array $fields, array $rules [,array $messages]) :array
```
validates Data

# Parameters
<ul>
    <li><code>$_POST</code> Form Data</li>
    <li><code>$fields</code> Validation Fields</li>
    <li><code>$rules</code> Validation Rules</li>
    <li><code>$messages</code> <i>(optional)</i> Validation Messages</li>
</ul>

# Return value
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

```php
validate($_POST, $fields, $rules, $messages);
```

```bash
$ php -S localhost:8000
```
Now you can visit [http://localhost:8000/](http://localhost:8000/) in your browser to view the output of this example.

# Rules
<ul id="rules">
    <li><a href="#required">Required</a></li>
    <li><a href="#email">Email</a></li>
    <li><a href="#min">Min</a></li>
    <li><a href="#max">Max</a></li>
    <li><a href="#alpha">Alpha</a></li>
    <li><a href="#alphanumberic">Alphanumberic</a></li>
    <li><a href="#string">String</a></li>
    <li><a href="#numeric">Numeric</a></li>
</ul>

<h1 id="required">Required</h1>

```php
    'username' => ['required']
```
<a href="#rules">Back To Top</a>

<h1 id="email">Email</h1>

```php
    'user_email' => ['email']
```
<a href="#rules">Back To Top</a>

<h1 id="min">Min</h1>

```php
    'password' => ['min' => 6]
```
<a href="#rules">Back To Top</a>

<h1 id="max">Max</h1>

```php
    'password' => ['max' => 25]
```
<a href="#rules">Back To Top</a>

<h1 id="alpha">Alpha</h1>

```php
    'name' => ['alpha']
```
<a href="#rules">Back To Top</a>

<h1 id="alphanumberic">Alphanumberic</h1>

```php
    'username' => ['alphanumberic']
```
<a href="#rules">Back To Top</a>

<h1 id="string">String</h1>

```php
    'address' => ['string']
```
<a href="#rules">Back To Top</a>

<h1 id="numeric">Numeric</h1>

```php
    'phone_number' => ['numeric']
```
<a href="#rules">Back To Top</a>
