<?php

class AlphaRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'state'
		];

		$this->rule = [
			'state' => [
				'alpha'
			]
		];
	}

	public function testValid() :void {
		$data = [
			'state' => 'lagos'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		$data = [
			'state' => 'lagos & abuja'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
