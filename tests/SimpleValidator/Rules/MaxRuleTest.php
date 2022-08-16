<?php

class MaxRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'title'
		];

		$this->rule = [
			'title' => [
				'max' => 25
			]
		];
	}

	public function testValid() :void {
		$data = [
			'title' => 'This is my post title'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		$data = [
			'title' => 'This is my very long post title'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
