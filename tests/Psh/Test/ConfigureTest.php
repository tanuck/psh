<?php

namespace Psh\Test;

use Psh\Configure;

class ConfigureTest extends \PHPUnit_Framework_TestCase {

	public function testLoad()
	{
		$config = [
			'key1' => 'val1',
			'key2' => 'val2',
			'key3' => [
				'value' => 'key3_val1',
			],
		];
		Configure::load($config);

		$this->assertEquals($config, Configure::get());

		Configure::load([]);
		$this->assertEquals([], Configure::get());
	}

	public function testDump()
	{
		$config = [
			'key' => 'value',
			'key2' => [
				'foo' => 'bar',
			],
		];
		Configure::load($config);

		$this->assertEquals($config, Configure::dump());
		$this->assertEquals([], Configure::get());
	}

	public function testSet()
	{

	}
}
