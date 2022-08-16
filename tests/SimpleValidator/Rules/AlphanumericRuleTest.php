<?php

class AlphanumericRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'username'
		];

		$this->rule = [
			'username' => [
				'alphanumeric'
			]
		];
	}

	public function testValid() :void {
		$data = [
			'username' => 'johndoe007'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		$data = [
			'username' => 'johndoe@007'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
