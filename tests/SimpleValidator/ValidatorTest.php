<?php

class ValidatorTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->fields = [
			'username', 'email','password', 'remember_me'
		];

		$this->rules = [
			'username' => [
		        'required', 'min' => 3, 'max' => 20
		    ],
		    'email' => [
		        'required', 'email'
		    ],
		    'password' => [
		        'required', 'min' => 5, 'max' => 25
		    ],
		    'remember_me' => [
		      'nullable'
		    ]
		];
	}

	public function testValid(){
		$data = [
			'username' => 'johndoe',
			'email' => 'johndoe@example.com',
			'password' => 'secret password',
			'remember_me' => true
		];

		$response = validate($data, $this->fields, $this->rules);
		
		$this->assertEmpty($response);
	}

	public function testInvalid(){
		$data = [
			'username' => 'john',
			'email' => 'johndoe@example',
			'password' => 'secret',
			'remember_me' => false
		];

		$response = validate($data, $this->fields, $this->rules);
		
		$this->assertIsArray($response);
	}
}
