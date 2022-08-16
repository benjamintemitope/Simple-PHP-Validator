<?php

class RequiredRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'username'
		];

		$this->rule = [
			'username' => [
				'required'
			]
		];
	}

	public function testValid(){
		$data = [
			'username' => 'johndoe'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid(){
		$data = [
			'username' => ''
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
