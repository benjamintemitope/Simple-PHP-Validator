<?php

class LowerRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'generic_field'
		];

		$this->rule = [
			'generic_field' => [
				'lower'
			]
		];
	}

	public function testValid() :void {
		$data = [
			'generic_field' => 'lowercase'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		$data = [
			'generic_field' => 'UPPERCASE'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
