<?php

class EmailRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'user_email'
		];

		$this->rule = [
			'user_email' => [
				'email'
			]
		];
	}

	public function testValid(){
		$data = [
			'user_email' => 'johndoe@example.com'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid(){
		$data = [
			'user_email' => 'johndoe@example'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
