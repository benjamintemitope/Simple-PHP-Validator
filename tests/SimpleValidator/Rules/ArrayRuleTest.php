<?php

class ArrayRuleTest extends \PHPUnit\Framework\TestCase{

	public function setUp() : void{
		$this->field = [
			'tags'
		];

		$this->rule = [
			'tags' => [
				'array'
			]
		];
	}

	public function testValid() :void {
		$data = [
			'tags' => [
				'php', 'phpunit', 'tdd'
			]
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertEmpty($response);
	}

	public function testInvalid() :void {
		$data = [
			'tags' => 'php'
		];

		$response = validate($data, $this->field, $this->rule);
		
		$this->assertIsArray($response);
	}
}
