<?php

class NullableRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'remember_me'
		];

		$this->rule = [
			'remember_me' => [
				'nullable'
			]
		];
	}

	public function testValid() :void {
		$data = [
			'remember_me' => false
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}
}
