<?php

class StringRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'name'
		];

		$this->rule = [
			'name' => [
				'string'
			]
		];
	}

	public function testValid() :void {
		$data = [
			'name' => 'johndoe'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		$data = [
			'name' => 123456
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
