<?php

class MinRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'password'
		];

		$this->rule = [
			'password' => [
				'min' => 8
			]
		];
	}

	public function testValid() :void {
		$data = [
			'password' => 'secret_password'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		$data = [
			'password' => 'secret'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
