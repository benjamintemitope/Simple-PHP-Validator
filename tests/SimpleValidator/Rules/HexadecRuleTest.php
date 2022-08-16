<?php

class HexadecRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'generic_field'
		];

		$this->rule = [
			'generic_field' => [
				'hexadec'
			]
		];
	}

	public function testValid() :void {
		$data = [
			'generic_field' => 'AB10BC99'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		$data = [
			'generic_field' => 'AR1012'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
