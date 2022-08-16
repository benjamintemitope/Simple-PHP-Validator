<?php

class NumericRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'phone_number'
		];

		$this->rule = [
			'phone_number' => [
				'numeric'
			]
		];
	}

	public function testValid() :void {
		// As of PHP 8.1.0 ctype_digit works effectively with string
		$data = [
			'phone_number' => '123456789'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		// As of PHP 8.1.0 ctype_digit works effectively with string
		$data = [
			'phone_number' => '1234.56789'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
